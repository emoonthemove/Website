/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * JSON syntax highlighting transformation plugin
 *
 * @package PhpMyAdmin
 */
AJAX.registerOnload('transformations/json_editor.js', function () {
    $('textarea.transform_json_editor').each(function () {
        CodeMirror.fromTextArea(this, {
            lineNumbers: true,
            matchBrackets: true,
            indentUnit: 4,
            mode: 'application/json',
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