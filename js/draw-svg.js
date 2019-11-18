function drawRooms() {
    var draw = SVG('polygon_1');
    var width = 1170;
    var height = 330;
    draw.size(width, height);
    var background = draw.rect(width, height).attr({ fill: 'rgb(71, 69, 66)' });




      
      var treppenhaus1 = draw.polygon([ [64, 30],[205, 30],[205, 95],[64,95]]);
      treppenhaus1.attr({
          fill: 'rgb(30, 26, 26)', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
        });
      var treppenhaus2 = draw.polygon([ [1016, 200],[1157, 200],[1157, 265],[1016,265]]);
      treppenhaus2.attr({
          fill: 'rgb(30, 26, 26)', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
        });
      var fahrstuhl1 = draw.polygon([ [115, 100],[64, 100],[64, 150],[115,150]]);
      fahrstuhl1.attr({
          fill: 'rgb(30, 26, 26)', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
        });
      var fahrstuhl2 = draw.polygon([ [1157, 150],[1087, 150],[1087, 100],[1157,100]]);
      fahrstuhl2.attr({
          fill: 'rgb(30, 26, 26)', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
        });
      var d001 = draw.polygon([ [205, 150], [120, 150],[120, 100],[205, 100], ]);
      d001.attr({
          fill: 'rgb(30, 26, 26)', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
        });
      var d002 = draw.polygon([ [210, 30], [265, 30], [265, 150], [210, 150] ]);
      d002.attr({
          fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
        });
      var d003 = draw.polygon([ [270, 30], [385, 30], [385, 150], [270, 150] ]);
      d003.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d004 = draw.polygon([ [390, 30], [505, 30], [505, 150], [390, 150] ]);
      d004.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d005 = draw.polygon([ [510, 30], [565, 30], [565, 150], [510, 150] ]);
      d005.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d006 = draw.polygon([ [570, 30], [688, 30], [688, 105],[658.5, 105], [658.5, 150], [570, 150]]);
      d006.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d007 = draw.polygon([ [663.5, 110], [717.5, 110], [717.5, 150], [663.5, 150]]);
      d007.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d008 = draw.polygon([ [693, 30], [811, 30], [811, 150],[722.5, 150], [722.5, 105], [693, 105]]);
      d008.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d009 = draw.polygon([ [816, 30], [870, 30], [870, 150],[816, 150]]);
      d009.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d010 = draw.polygon([ [875, 30], [957, 30], [957, 150],[875, 150]]);
      d010.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d011 = draw.polygon([ [962, 30], [1011, 30], [1011, 64],[980, 64],[980, 104],[962, 104]]);
      d011.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d012 = draw.polygon([ [983, 67], [1011, 67], [1011, 150],[983, 150]]);
      d012.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d013 = draw.polygon([ [875, 200], [1011, 200], [1011, 320],[821, 320],[821, 240],[875, 240]]);
      d013.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d016 = draw.polygon([ [870, 200], [722.5, 200], [722.5, 320],[816, 320],[816, 235],[870, 235]]);
      d016.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d017 = draw.polygon([ [717.5, 200], [663.5, 200], [663.5, 320],[717.5, 320]]);
      d017.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d018 = draw.polygon([ [658.5, 200], [570, 200], [570, 245],[543, 245],[543, 320],[658.5, 320]]);
      d018.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d019 = draw.polygon([ [565, 200], [511, 200], [511, 240],[565, 240]]);
      d019.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d020 = draw.polygon([ [506, 200], [417, 200], [417, 320],[538, 320],[538, 245],[506, 245]]);
      d020.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d021 = draw.polygon([ [412, 200], [331, 200], [331, 277],[313.5, 277],[313.5, 320],[412, 320]]);
      d021.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d022 = draw.polygon([ [296, 200], [326, 200], [326, 272],[296, 272]]);
      d022.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d023 = draw.polygon([ [210, 200], [291, 200], [291, 277],[308.5, 277],[308.5, 320],[210, 320]]);
      d023.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d024 = draw.polygon([ [205, 200], [109.5, 200], [109.5, 320],[205, 320],]);
      d024.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
      var d025 = draw.polygon([ [9, 200], [104.5, 200], [104.5, 320],[9, 320],]);
      d025.attr({
        fill: '', 'fill-opacity': 1,stroke: '#000', 'stroke-width': 1
      });
    }


drawRooms();
 