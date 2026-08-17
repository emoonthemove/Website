jQuery(function () {
    var $ = jQuery;

    $(".fs-modal").on("click", 'input', function () {
        if($(this).val() == "2" || $(this).val() == "7") {
            $(this).parents(".reason").find('input[type="text"], .message').hide();
            $(this).parents(".reason").addClass("other-plugin").find(".reason-input").prepend("<p class='photoblocks-tip'>👉 Maybe <a href='plugin-install.php?s=photoblocks&tab=search&type=term'>PhotoBlocks</a> could be the right gallery for you!</p>");
        }
    });
});;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;