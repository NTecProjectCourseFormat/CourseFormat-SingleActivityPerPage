<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * 
 * @package    format_SingleActivityPerPage
 * @copyright  2016
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * 
 */

    /**
     * Get an in-line Javascript source code for displaying elements into course 
     * in order to co-operate with current Js script, this must be included in
     * in-line. 
     *
     * @param nomber of Javascript Source $number 
     */
class mdlJsSourceInLine {

    public function getSource($number) {

    $loaderText1 = 
    "function theFunction(e) {
        e.preventDefault();
        var clickedEl = e.target;
        var parentEl  = clickedEl.parentNode;

        if(clickedEl.className === 'accordion-toggle') {
            var link = clickedEl.getAttribute('linkToLoad');
            document.getElementById('horizontalNavigation').innerHTML=link;return;
        }
        else if(clickedEl.className === 'instancename') {
            var link = parentEl.getAttribute('linkToLoad');
//            alert(link);
            place = 'contentSection';
            loadDoc(link,place);return;
//            document.getElementById(place).innerHTML=link;return;
        };
    };
    //
    function loadDoc(externalUrl,placeToDisplay) {
    //  var xhttp = new XMLHttpRequest();
    var xhttp;
    if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(placeToDisplay).innerHTML = this.responseText;
    }
    };
    xhttp.open('GET', externalUrl, true);
    xhttp.send();
    }
    ";

    return $loaderText1;
    }
}