<?php
/**
 * 
 */
class URI
{
    var $segments; 
    var $completeURL;

    function fetchURL() {
        $this->completeURL = isset($_GET['url']) ? $_GET['url'] : NULL;
    }

    function getCompleteURL() {
        return $this->completeURL;
    }

    function explodeURL() {
        $url      = rtrim($this->completeURL, '/');
        $url      = $this->filterURL($url);
        $segments = explode('/', $url);

        $this->segments = $segments;
    }

    function filterURL($url) {
        $bad  = array("$", "(", ")", "%28", "%29");
        $good = array("&#36;", "&#40;", "&#41;", "&#40;", "&#41");
        
        return str_replace($bad, $good, $url);  
    }

    function getSegments() {
        return $this->segments;
    }
}
