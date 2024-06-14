$(function () {
    // let accordionDetails = '.js-details';
    // let accordionSummary = '.js-details-summary';
    // let accordionContent = '.js-details-content';
    // let speed = 300

    // $(accordionSummary).each(function () {
    //     $(this).on("click", function (event) {
    //         // デフォルトの挙動を無効化
    //         event.preventDefault();
    //         // summaryにis-activeクラスを切り替え
    //         $(this).toggleClass("is-active");

    //         if ($(this).parent($(accordionDetails)).attr("open")) {
    //             // アコーディオンを閉じるときの処理
    //             $(this).nextAll($(accordionContent)).slideUp(speed, function () {
    //                 // アニメーションの完了後にopen属性を取り除く
    //                 $(this).parent($(accordionDetails)).removeAttr("open");
    //             });
    //         } else {
    //             // アコーディオンを開くときの処理
    //             // open属性を付ける
    //             $(this).parent($(accordionDetails)).attr("open", "true");
    //             // いったんdisplay:none;してからslideDownで開く
    //             $(this).nextAll($(accordionContent)).hide().slideDown(speed);
    //         }
    //     })
    // })

    let accordionDetails = '.js-details';
    let accordionSummary = '.js-details-summary';
    let accordionContent = '.js-details-content';
    let speed = 300;

    $(accordionSummary).each(function () {
        $(this).on("click", function (event) {
            // デフォルトの挙動を無効化
            event.preventDefault();

            let $summary = $(this);
            let $details = $summary.parent(accordionDetails);
            let $content = $summary.nextAll(accordionContent);
            let $icon = $summary.find(".icon i");

            // 他のアコーディオンを閉じる
            $(accordionDetails).not($details).each(function () {
                $(this).removeAttr("open");
                $(this).find(accordionContent).slideUp(speed);
                $(this).find(accordionSummary).removeClass("is-active");
                $(this).find(".icon i").removeClass("fa-minus").addClass("fa-plus");
            });

            if ($details.attr("open")) {
                // アコーディオンを閉じるときの処理
                $content.slideUp(speed, function () {
                    $details.removeAttr("open");
                    $summary.removeClass("is-active");
                    $icon.removeClass("fa-minus").addClass("fa-plus");
                });
            } else {
                // アコーディオンを開くときの処理
                $details.attr("open", "true");
                $summary.addClass("is-active");
                $content.hide().slideDown(speed);
                $icon.removeClass("fa-plus").addClass("fa-minus");
            }
        });
    });

});
