import './bootstrap';

Alpine.directive('swipe', (el, { expression, value }, { evaluateLater, cleanup }) => {
    const evaluate = evaluateLater(expression);
    const handle = (arg) => {
        evaluate(() => {}, { scope: {}, params: [arg] })
    };

    const touchStart = (e) => {
        el.dataset.startX = e.touches[0].clientX;
        el.dataset.startY = e.touches[0].clientY;
    };

    const touchEnd = (e) => {
        const endX = e.changedTouches[0].clientX;
        const endY = e.changedTouches[0].clientY;

        const diffX = endX - Number(el.dataset.startX);
        const diffY = endY - Number(el.dataset.startY);

        if (value === 'right' && diffX > 30) {
            handle();
        } else if (value === 'left' && diffX < -30) {
            handle();
        } else if (value === 'up' && diffY < -30) {
            handle();
        } else if (value === 'down' && diffY > 30) {
            handle();
        }
    };

    el.addEventListener('touchstart', touchStart);
    el.addEventListener('touchend', touchEnd);

    cleanup(() => {
        el.removeEventListener('touchstart', touchStart);
        el.removeEventListener('touchend', touchEnd);
    });
});
