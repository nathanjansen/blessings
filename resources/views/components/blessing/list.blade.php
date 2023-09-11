<ul {{ $attributes }}
    x-data="{
        hammer: null,
        registerSwipe(container, index) {
            const archiveBtnWrapper = container.querySelector('[x-ref=\'archiveBtnWrapper\']');
            const hammerInstance = new Hammer(container);

            const maxDragDistance = container.offsetWidth;

            hammerInstance.on('panleft', (e) => {
                let distance = e.distance > maxDragDistance ? maxDragDistance : e.distance;
                let percentage = (1 - distance / maxDragDistance) * 100;
                archiveBtnWrapper.style.transform = `translateX(${percentage}%)`;
            });

            hammerInstance.on('panright', (e) => {
                let distance = e.distance > maxDragDistance ? maxDragDistance : e.distance;
                let percentage = distance / maxDragDistance * 100;
                archiveBtnWrapper.style.transform = `translateX(${percentage}%)`;
            });

            hammerInstance.on('panend', (e) => {
                let snapThreshold = maxDragDistance * 0.5;
                if (e.distance > snapThreshold) {
                    archiveBtnWrapper.style.transform = e.offsetDirection === 4 ? 'translateX(100%)' : 'translateX(0)';
                } else {
                    archiveBtnWrapper.style.transform = e.offsetDirection === 4 ? 'translateX(0)' : 'translateX(100%)';
                }
            });

            container.addEventListener('click', function(e) {
                if (!archiveBtnWrapper.contains(e.target)) {
                    archiveBtnWrapper.style.transform = 'translateX(100%)';
                }
            });
        },
        init() {
            this.$el.querySelectorAll('[x-ref=\'blessingItem\']').forEach((container, index) => {
                this.registerSwipe(container, index);
            });
        },
    }"
>
    {{ $before ?? null }}
    @foreach ($blessings as $blessing)
        <x-blessing.item
            wire:key="blessing-{{ $blessing->id }}"
            :icon-class="$iconClass ?? null"
            :description-class="$descriptionClass ?? null"
            :$blessing
            :class="$itemClass . ' relative overflow-hidden'"
        />
    @endforeach
    {{ $after ?? null }}
</ul>
