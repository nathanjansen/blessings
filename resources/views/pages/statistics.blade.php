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


        $stats = Blessing::amountPerWeek()
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

@php $blessingCount = Blessing::count(); @endphp

<x-layouts.app class="max-w-4xl mx-auto">

    <x-slot:meta>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </x-slot:meta>

    <div class="w-full flex flex-col gap-6 bg-white rounded-lg p-4 pb-8">

        <h1 class="text-5xl font-bold mb-4">Statistieken</h1>

        <x-blessing.count
            :count="$blessingCount"
            class="text-black font-bold text-2xl"
        />

        @volt
        <div
            class="mt-4"
            wire:ignore
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
            <div class="font-light">Aantal zegeningen per week</div>
            <canvas x-ref="canvas" class="rounded-lg bg-white p-8"></canvas>
        </div>
        @endvolt

    </div>

</x-layouts.app>

