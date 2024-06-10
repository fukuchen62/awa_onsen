document.addEventListener('DOMContentLoaded', function () {
    // フォームの取得
    let spaForm = document.getElementById('searchform-spa');
    let facilityForm = document.getElementById('searchform-facility');
    let courseForm = document.getElementById('searchform-course');

    // フォーム送信イベントのキャプチャ
    if (spaForm) {
        spaForm.addEventListener('submit', function (event) {
            event.preventDefault(); // デフォルトのフォーム送信を防止
            let formData = new FormData(spaForm);
            let searchParams = new URLSearchParams(formData).toString();
            window.location.href = spaForm.action + '?' + searchParams;
            setTimeout(function () {
                window.location.href = spaForm.action; // クエリパラメータをクリア
            }, 1000);
        });
    }

    if (facilityForm) {
        facilityForm.addEventListener('submit', function (event) {
            event.preventDefault();
            let formData = new FormData(facilityForm);
            let searchParams = new URLSearchParams(formData).toString();
            window.location.href = facilityForm.action + '?' + searchParams;
            setTimeout(function () {
                window.location.href = facilityForm.action;
            }, 1000);
        });
    }

    if (courseForm) {
        courseForm.addEventListener('submit', function (event) {
            event.preventDefault();
            let formData = new FormData(courseForm);
            let searchParams = new URLSearchParams(formData).toString();
            window.location.href = courseForm.action + '?' + searchParams;
            setTimeout(function () {
                window.location.href = courseForm.action;
            }, 1000);
        });
    }
});
