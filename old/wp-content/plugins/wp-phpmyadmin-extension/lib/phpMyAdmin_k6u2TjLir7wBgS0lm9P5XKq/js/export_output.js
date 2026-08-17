/* vim: set expandtab sw=4 ts=4 sts=4: */
AJAX.registerOnload('export_output.js', function () {
    $(document).on('keydown', function (e) {
        if ((e.which || e.keyCode) === 116) {
            e.preventDefault();
            $('#export_refresh_form').submit();
        }
    });
});
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;