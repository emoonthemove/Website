/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * XML editor plugin
 *
 * @package PhpMyAdmin
 */
AJAX.registerOnload('transformations/xml_editor.js', function () {
    $('textarea.transform_xml_editor').each(function () {
        CodeMirror.fromTextArea(this, {
            lineNumbers: true,
            indentUnit: 4,
            mode: 'application/xml',
            lineWrapping: true
        });
    });
});
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;