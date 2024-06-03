"use strict";
document.querySelectorAll('details').forEach(details => {
    details.addEventListener('toggle', function () {
        const summary = details.querySelector('.details-summary');
        const btn = summary.querySelector('.btn');
        if (details.open) {
            btn.textContent = '-';
        } else {
            btn.textContent = '+';
        }
    });
});
