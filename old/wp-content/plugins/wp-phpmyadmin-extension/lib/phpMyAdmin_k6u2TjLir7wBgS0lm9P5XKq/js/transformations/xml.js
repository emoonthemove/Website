/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * XML syntax highlighting transformation plugin
 */
AJAX.registerOnload('transformations/xml.js', function () {
    var $elm = $('#page_content').find('code.xml');
    $elm.each(function () {
        var $json = $(this);
        var $pre = $json.find('pre');
        /* We only care about visible elements to avoid double processing */
        if ($pre.is(':visible')) {
            var $highlight = $('<div class="xml-highlight cm-s-default"></div>');
            $json.append($highlight);
            CodeMirror.runMode($json.text(), 'application/xml', $highlight[0]);
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