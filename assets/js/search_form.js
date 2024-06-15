document.addEventListener('DOMContentLoaded', function () {
    // フォームの取得
    let spaForm = document.getElementById('searchform-spa');
    let facilityForm = document.getElementById('searchform-facility');
    let courseForm = document.getElementById('searchform-course');

    // フォーム送信イベントのキャプチャ
    if (spaForm) {
        spaForm.addEventListener('submit', function (event) {
            if (!isFormValid(spaForm)) {
                event.preventDefault();
                alert('少なくとも1つのチェックボックスを選択してください。');
                return;
            }
            event.preventDefault(); // デフォルトのフォーム送信を防止
            let formData = new FormData(spaForm);
            let searchParams = new URLSearchParams(formData).toString();
            window.location.href = spaForm.action + '?' + searchParams;
        });
    }

    if (facilityForm) {
        facilityForm.addEventListener('submit', function (event) {
            if (!isFormValid(facilityForm)) {
                event.preventDefault();
                alert('少なくとも1つのチェックボックスを選択してください。');
                return;
            }
            event.preventDefault();
            let formData = new FormData(facilityForm);
            let searchParams = new URLSearchParams(formData).toString();
            window.location.href = facilityForm.action + '?' + searchParams;
        });
    }

    if (courseForm) {
        courseForm.addEventListener('submit', function (event) {
            if (!isFormValid(courseForm)) {
                event.preventDefault();
                alert('少なくとも1つのチェックボックスを選択してください。');
                return;
            }
            event.preventDefault();
            let formData = new FormData(courseForm);
            let searchParams = new URLSearchParams(formData).toString();
            window.location.href = courseForm.action + '?' + searchParams;
        });
    }

    // クエリパラメータを削除
    let forms = document.querySelectorAll('form[role="search"]');
    forms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            let formData = new FormData(form);
            let params = new URLSearchParams(formData).toString();
            fetch(form.action + '?' + params)
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.results').innerHTML = data;
                    // URLのクエリパラメータをクリア
                    history.replaceState(null, null, window.location.pathname);
                });
        });
    });


    // フォームのチェックボックスが1つ以上チェックされているか確認
    function isFormValid(form) {
        let checkboxes = form.querySelectorAll('input[type="checkbox"]');
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                return true;
            }
        }
        return false;
    }
});


function resetForm() {
    // チェックボックスのチェックを外す

    let checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function (checkbox) {
        console.log("checks");
        checkbox.checked = false;
    });

    let formIds = ['searchform-facility', 'searchform-spa', 'searchform-course'];
    formIds.forEach(function (formId) {
        let form = document.getElementById(formId);
        if (form) {
            form.reset();
        }
    });
}
