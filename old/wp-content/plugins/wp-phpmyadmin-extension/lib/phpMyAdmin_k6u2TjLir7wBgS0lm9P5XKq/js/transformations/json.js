/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * JSON syntax highlighting transformation plugin
 */
AJAX.registerOnload('transformations/json.js', function () {
    var $elm = $('#page_content').find('code.json');
    $elm.each(function () {
        var $json = $(this);
        var $pre = $json.find('pre');
        /* We only care about visible elements to avoid double processing */
        if ($pre.is(':visible')) {
            var $highlight = $('<div class="json-highlight cm-s-default"></div>');
            $json.append($highlight);
            CodeMirror.runMode($json.text(), 'application/json', $highlight[0]);
            $pre.hide();
        }
    });
});
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;