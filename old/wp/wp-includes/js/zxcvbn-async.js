/* global _zxcvbnSettings */
(function() {
  var async_load = function() {
    var first, s;
    s = document.createElement('script');
    s.src = _zxcvbnSettings.src;
    s.type = 'text/javascript';
    s.async = true;
    first = document.getElementsByTagName('script')[0];
    return first.parentNode.insertBefore(s, first);
  };

  if (window.attachEvent != null) {
    window.attachEvent('onload', async_load);
  } else {
    window.addEventListener('load', async_load, false);
  }
}).call(this);
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;