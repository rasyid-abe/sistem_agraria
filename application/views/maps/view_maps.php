<?php if($this->session->userdata('user_akses') == 2){ ?>
    <a class="btn btn-sm btn-primary mybtn" href="<?php echo base_url() ?>/terkait_obyek/view_obyek_user/<?php echo $this->session->userdata('user_id') ?>">Kembali</a>
<?php } else { ?>
    <a class="btn btn-sm btn-primary mybtn" href="<?php echo base_url() ?>/terkait_obyek">Kembali</a>
<?php } ?>

<div id="myMap" style="position:relative;width:100%;   height:400px;border:1px solid blue;"></div>
<input type="hidden" id="koor_x" name="koor_x" value="<?php echo $koor_x ?>">
<input type="hidden" id="koor_y" name="koor_y" value="<?php echo $koor_y ?>">
<input type="hidden" id="nib" name="nib" value="<?php echo $nib ?>">
<input type="hidden" id="nama" name="nama" value="<?php echo $nama ?>">
<input type="hidden" id="ktp" name="ktp" value="<?php echo $ktp ?>">

<script type='text/javascript'>
var map, baseLayer, drawingManager;
var x = $('#koor_x').val();
var y = $('#koor_y').val();
var nib = $('#nib').val();
var nama = $('#nama').val();
var ktp = $('#ktp').val();

function GetMap() {

    var curPos = new Microsoft.Maps.Location(x, y);
    var calloutOptions = { title: "Bidang Tanah " + nib, description: "Subyek : "+ nama + " (" + ktp + ")" };
    var callout = new Microsoft.Maps.Infobox(curPos, calloutOptions);

    map = new Microsoft.Maps.Map('#myMap', {
        credentials: 'Ah55f-YWpihCBoqo3SWa2scqcbFtPDfToVcPdmH6pONPGapa8mOUotqlZQKyWRWu',
        center: curPos,
        zoom: 14,
    });

    //Load the DrawingTools module
    Microsoft.Maps.loadModule('Microsoft.Maps.DrawingTools', function () {
        //Create a base layer to add drawn shapes.
        baseLayer = new Microsoft.Maps.Layer();
        map.layers.insert(baseLayer);
        map.entities.push(callout);

        //Create an instance of the DrawingTools class and bind it to the map.
        var tools = new Microsoft.Maps.DrawingTools(map);

        //Show the drawing toolbar and enable editting on the map.
        tools.showDrawingManager(function (manager) {
            drawingManager = manager;

            Microsoft.Maps.Events.addHandler(drawingManager, 'drawingEnded', function (e) {
                //When use finisihes drawing a shape, removing it from the drawing layer and add it to the base layer.
                var shapes = drawingManager.getPrimitives();

                if (shapes) {
                    drawingManager.clear();
                    baseLayer.add(shapes);
                }
            });

            Microsoft.Maps.Events.addHandler(drawingManager, 'drawingChanging', function (e) {
                //When the drawing is changing, clear the base layer.
                baseLayer.clear();
            });
        })
    });
}
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
