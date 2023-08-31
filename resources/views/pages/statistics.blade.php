<?php

use function Laravel\Folio\name;
use function Livewire\Volt\state;
use App\Models\Blessing;

name('statistics');

$labels = ['week'];
for ($i = 10; $i >= 0; $i--) {
    $labels[] = now()->week - $i;
}

state(
    labels: $labels,
    values: function () use ($labels) {


        $stats = Blessing::weekly()
            ->mapWithKeys(fn($labels) => [$labels['week'] => $labels['count']]);

        unset($labels[0]);

        $values = [];
        foreach ($labels as $week) {
            $values[$week] = $stats[$week] ?? 0;
        }

        return $values;
    },
)

?>

@php

$blessingCount = Blessing::count();
$mostBlessedDay = Blessing::mostBlessedDay();

// Get the date of the first blessing
$firstBlessingDate = Blessing::min('date');

// Calculate the total days from the first usage until now
$totalDays = $firstBlessingDate ? now()->parse($firstBlessingDate)->diffInDays(now()) + 1 : 0;

// Hoeveel blessings zijn er in totaal;
$totalBlessings = Blessing::count();

// Aantal blessings delen door aantal dagen = gemiddelde per dag;
$averagePerDay = $totalDays > 0 ? $totalBlessings / $totalDays : 0;

// Gemiddelde per dag x 7 = gemiddelde per week;
$averagePerWeek = $averagePerDay * 7;

// Gemiddelde per week x 52 delen door 12 = gemiddelde per maand;
$averagePerMonth = ($averagePerWeek * 52) / 12;

// Blessings for the most recent day
$todayBlessings = Blessing::whereDate('date', now()->today())->count();
$yesterdayBlessings = Blessing::whereDate('date', now()->yesterday())->count();

// Blessings for the current week
$thisWeekBlessings = Blessing::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->count();
$lastWeekBlessings = Blessing::whereBetween('date', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();

// Blessings for the current month
$thisMonthBlessings = Blessing::whereMonth('date', now()->month)->count();
$lastMonthBlessings = Blessing::whereMonth('date', now()->subMonth()->month)->count();

// Comparison
$dailyComparison = $todayBlessings - $yesterdayBlessings;
$weeklyComparison = $thisWeekBlessings - $lastWeekBlessings;
$monthlyComparison = $thisMonthBlessings - $lastMonthBlessings;

@endphp

<x-layouts.app class="max-w-4xl mx-auto">

    <div class="w-full flex flex-col gap-6 bg-white rounded-lg p-4 pb-8">

        <h1 class="text-5xl font-bold mb-4">Statistieken</h1>

        <x-blessing.count
            :count="$blessingCount"
            class="text-black font-bold text-2xl"
        />

        @volt
        <div
            class="mt-4"
            x-data="{
                values: @js($this->values),
                chart: null,
                gradient(ctx) {
                    let gradient = ctx.createLinearGradient(0, 0, 0, 400); // Assuming a canvas height of 400
                    gradient.addColorStop(0, 'rgba(238, 244, 230, 1)');
                    gradient.addColorStop(1, 'rgba(238, 244, 230, 0.4)');

                    return gradient;
                },
                init() {
                    let ctx = this.$refs.canvas.getContext('2d');

                    let gradient = this.gradient(ctx);

                    this.chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: this.labels,
                            datasets: [{
                                data: this.values,
                                backgroundColor: '#479d4a',
                                borderColor: '#479d4a',
                                borderWidth: 2,
                                pointBorderColor: 'white',
                                pointBorderWidth: 2,
                                pointRadius: 5,
                                pointHoverRadius: 8,
                                fill: {
                                    target: 'origin',
                                    above: gradient,
                                    below: gradient
                                }
                            }]
                        },
                        options: {
                            interaction: { intersect: false },
                            scales: {
                                x: {
                                    ticks: {
                                        padding: 20,
                                    },
                                    border: {
                                      display: true,
                                    },
                                    grid: {
                                      drawBorder: false,
                                      display: false,
                                      drawOnChartArea: true,
                                      drawTicks: true,
                                    }
                                  },
                                  y: {
                                    ticks: {
                                        padding: 20,
                                    },
                                    border: {
                                      display: false
                                    },
                                    grid: {
                                      drawBorder: false,
                                      display: true,
                                      drawOnChartArea: true,
                                      drawTicks: true,
                                    },
                                  }
                            },
                            plugins: {
                                legend: { display: false },
                            },
                        },
                    })

                    this.$watch('values', () => {
                        chart.data.labels = this.labels
                        chart.data.datasets[0].data = this.values
                        chart.update()
                    })
                }
            }"
            class="w-full"
        >
            <div class="font-light text-lg">Aantal zegeningen per week</div>
            <canvas x-ref="canvas" class="rounded-lg bg-white"></canvas>
        </div>
        @endvolt

        <h2 class="text-2xl font-bold">Gemiddelden</h2>

        <div class="flex flex-col gap-4 text-lg max-w-3xl w-full">
            <div class="flex items-center gap-2">
                <div class="font-light w-40">Per dag</div>
                <div class="font-bold flex gap-4 items-center">
                    {{ number_format($averagePerDay, 2) }}
                    <span>
                    @if ($dailyComparison > 0)
                        <span class="text-sm text-primary-500 font-normal">+{{ number_format($dailyComparison, 1) }}</span>
                    @else
                        <span class="text-sm font-normal opacity-50">{{ number_format($dailyComparison, 1) }}</span>
                    @endif
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="font-light w-40">Per week</div>
                <div class="font-bold flex gap-4 items-center">
                    {{ number_format($averagePerWeek, 2) }}
                    <span>
                    @if ($weeklyComparison > 0)
                            <span class="text-sm text-primary-500 font-normal">+{{ number_format($weeklyComparison, 1) }}</span>
                        @else
                            <span class="text-sm font-normal opacity-50">{{ number_format($weeklyComparison, 1) }}</span>
                        @endif
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="font-light w-40">Per maand</div>
                <div class="font-bold flex gap-4 items-center">
                    {{ number_format($averagePerMonth, 2) }}
                    <span>
                    @if ($monthlyComparison > 0)
                            <span class="text-sm text-primary-500 font-normal">+{{ number_format($monthlyComparison, 1) }}</span>
                        @else
                            <span class="text-sm font-normal opacity-50">{{ number_format($monthlyComparison, 1) }}</span>
                        @endif
                    </span>
                </div>
            </div>
{{--            <div class="flex items-center gap-2">--}}
{{--                <div class="text-[#888] font-light">Per jaar</div>--}}
{{--                <div class="font-bold">--}}
{{--                    {{ round($blessingCount / now()->year, 2) }}--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

        <h2 class="text-2xl font-bold">Meest gezegende dag van de week</h2>

        <div class="text-lg font-light">
            {{ ucfirst(now()->create($mostBlessedDay)->dayName) }}
        </div>

    </div>

</x-layouts.app>

