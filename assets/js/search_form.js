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
            history.replaceState(null, null, spaForm.action + '?' + searchParams);
            window.location.href = spaForm.action + '?' + searchParams;
        });
    }

    if (facilityForm) {
        facilityForm.addEventListener('submit', function (event) {
            event.preventDefault();
            let formData = new FormData(facilityForm);
            let searchParams = new URLSearchParams(formData).toString();
            history.replaceState(null, null, facilityForm.action + '?' + searchParams);
            window.location.href = facilityForm.action + '?' + searchParams;
        });
    }

    if (courseForm) {
        courseForm.addEventListener('submit', function (event) {
            event.preventDefault();
            let formData = new FormData(courseForm);
            let searchParams = new URLSearchParams(formData).toString();
            history.replaceState(null, null, courseForm.action + '?' + searchParams);
            window.location.href = courseForm.action + '?' + searchParams;
        });
    }

    // クエリパラメータを削除
    window.addEventListener('load', function () {
        if (window.location.search) {
            history.replaceState(null, null, window.location.pathname);
        }
    });
});
