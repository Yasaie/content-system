
/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* Dashboard 2
*/

!function($) {
    "use strict";

    var Dashboard2 = function() {
    	this.$realData = []
    };

    //creates area chart with dotted
    Dashboard2.prototype.createAreaChartDotted = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 0,
            lineWidth: 0,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            pointFillColors: Pfillcolor,
            pointStrokeColors: Pstockcolor,
            resize: true,
            gridLineColor: '#eef0f2',
            lineColors: lineColors
        });

   },
    Dashboard2.prototype.init = function() {

    },
    //init
    $.Dashboard2 = new Dashboard2, $.Dashboard2.Constructor = Dashboard2
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Dashboard2.init();
}(window.jQuery);