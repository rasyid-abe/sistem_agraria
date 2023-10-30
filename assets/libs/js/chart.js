(function(window, document, $, undefined) {
    "use strict";
    $(function() {

        if ($('#penggunaan_bar').length) {
            Morris.Bar({
                element: 'penggunaan_bar',
                data: [
                    { x: '2011 Q1', y: 0 },
                    { x: '2011 Q2', y: 123 },
                    { x: '2011 Q3', y: 243 },
                    { x: '2011 Q4', y: 323 },
                    { x: '2012 Q1', y: 42 },
                    { x: '2012 Q2', y: 5324 },
                    { x: '2012 Q3', y: 6435 },
                    { x: '2012 Q4', y: 753 },
                    { x: '2013 Q1', y: 832 }
                ],
                xkey: 'x',
                ykeys: ['y'],
                labels: ['Y'],
                   barColors: ['#5969ff'],
                     resize: true,
                        gridTextSize: '14px'

            });
        }

        if ($('#pemanfaatan_bar').length) {
            Morris.Bar({
                element: 'pemanfaatan_bar',
                data: [
                    { x: '2011 Q1', y: 0 },
                    { x: '2011 Q2', y: 123 },
                    { x: '2011 Q3', y: 243 },
                    { x: '2011 Q4', y: 323 },
                    { x: '2012 Q1', y: 42 },
                    { x: '2012 Q2', y: 5324 },
                    { x: '2012 Q3', y: 6435 },
                    { x: '2012 Q4', y: 753 },
                    { x: '2013 Q1', y: 832 }
                ],
                xkey: 'x',
                ykeys: ['y'],
                labels: ['Y'],
                   barColors: ['#5969ff'],
                     resize: true,
                        gridTextSize: '14px'

            });
        }



        if ($('#penggunaan_donut').length) {
            Morris.Donut({
                element: 'penggunaan_donut',
                data: [
                    { value: 70, label: 'foo' },
                    { value: 15, label: 'bar' },
                    { value: 10, label: 'baz' },
                    { value: 5, label: 'A really really long label' }
                ],

                labelColor: '#2e2f39',
                   gridTextSize: '14px',
                colors: [
                     "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750"

                ],

                formatter: function(x) { return x + "%" },
                  resize: true
            });
        }

        if ($('#pemanfaatan_donut').length) {
            Morris.Donut({
                element: 'pemanfaatan_donut',
                data: [
                    { value: 70, label: 'foo' },
                    { value: 15, label: 'bar' },
                    { value: 10, label: 'baz' },
                    { value: 5, label: 'A really really long label' }
                ],

                labelColor: '#2e2f39',
                   gridTextSize: '14px',
                colors: [
                     "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750"

                ],

                formatter: function(x) { return x + "%" },
                  resize: true
            });
        }

    });

})(window, document, window.jQuery);
