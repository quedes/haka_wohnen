function inject_ga() {
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71742658-1', 'auto');
  ga('send', 'pageview');
}

if (document.readyState === "complete") {
  inject_ga();
} else
if(window.addEventListener) {
  window.addEventListener('load',inject_ga,false); //W3C
} else{
  window.attachEvent('onload',inject_ga); //IE
}
