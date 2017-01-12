<!doctype html>
<html>
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.0/css/bulma.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <body>
        <?php include("includes/nav.php") ?>


        <section class="hero is-primary is-bold">
            <div class="container">
            </div>
            <div class="hero-body">
                <div class="container">
                    <h1 class="title is-1">
                        Request A Delivery
                    </h1>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="content">
                    <h1 class="title">We'll need a few details first.</h1>
                    <div class="columns">
                        <div class="column is-8 is-offset-2">
                            <form>
                                <label class="label">Description</label>
                                <p class="control">
                                    <input class="input" type="text" name="description" />
                                </p>

                                <label class="label">Packages</label>
                                <div class="box">
                                    <table class="table">
                                        <thead>
                                            <th>Name</th>
                                            <th>Width (cm)</th>
                                            <th>Height (cm)</th>
                                            <th>Depth (cm)</th>
                                            <th>Weight (g)</th>
                                            <th>Cost (£)</th>
                                        </thead>
                                        <tbody id="pkglist">
                                        </tbody>
                                    </table>
                                    <div id="nopackageswarning" class="notification">
                                        This shipment currently has no packages!
                                    </div>

                                    <div class="columns">
                                        <div class="column is-8">
                                            <label class="label">Name</label>
                                            <p class="control">
                                                <input class="input" type="text" id="pkgname" />
                                            </p>
                                            <label class="label">Width, Height, Depth (cm)</label>
                                            <div class="control is-grouped">
                                                <p class="control is-expanded">
                                                    <input class="input" type="text" id="pkgwidth" placeholder="Width"/>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input class="input" type="text" id="pkgheight" placeholder="Height"/>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input class="input" type="text" id="pkgdepth" placeholder="Depth"/>
                                                </p>
                                            </div>

                                            <label class="label">Weight (g)</label>
                                            <p class="control">
                                                <input class="input" type="text" id="pkgweight" />
                                            </p>
                                        </div>
                                        <div class="column is-4">
                                            <label class="label">Cost</label>
                                            <p class="control">
                                                <input class="input" disabled type="text" id="pkgcost" />
                                            </p>
                                            <p>Cost = (width + height + depth) x £0.10.</p>
                                            <button class="button title is-4 is-primary" type="button" id="pkgadd">Add</button>
                                            <button class="button title is-4 is-danger" type="button" id="pkgclear">Clear</button>
                                        </div>
                                    </div>
                                </div> <!-- end of packages -->

                                <label class="label">Shipping Type</label>
                                <p class="control">
                                    <span class="select">
                                        <select>
                                            <option>Default</option>
                                        </select>
                                    </span>
                                </p>

                                <label class="label">Total cost (£)</label>
                                <input class="input subtitle is-2" name="cost" value="34.34" disabled="true"/>

                                <div class="control is-grouped">
                                    <p class="control">
                                        <button class="button is-large is-primary">Submit</button>
                                    </p>

                                    <p class="control">
                                        <a class="button is-large is-link" href="/">Cancel</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
        <script>

        $.fn.reduce = [].reduce;

        var clearPkg = function () {
            $('input')
                .filter(function () {
                    return this.id.match(/^pkg/);
                })
                .each(function (i) {
                    $(this).val("");
                })
        };

        var updatePkgCost = function() {
            var width = $('#pkgwidth').val()? parseInt($('#pkgwidth').val(),10) : 0;
            var height = $('#pkgheight').val()? parseInt($('#pkgheight').val(),10) : 0;
            var depth = $('#pkgdepth').val()? parseInt($('#pkgdepth').val(),10) : 0;

            $('#pkgcost').val((Math.round((width + height + depth) * 10) / 100).toString());

            return $('#pkgcost').val();
        }

        var pkgcount = 0;

        $('#pkgwidth').change(updatePkgCost);
        $('#pkgheight').change(updatePkgCost);
        $('#pkgdepth').change(updatePkgCost);

        var updateCost = function () {
            return $('input')
                .filter(function () {
                    return ($(this).attr("name") && $(this).attr("name").match(/^packages\[\d+\]\[cost\]$/));
                })
                .map(function () {
                    return $(this).val()? parseFloat($(this).val(), 10) : 0;
                })
                .reduce(function (a,b) {
                    return a + (Math.round(b*100) / 100);
                },0);
        };

        $('#pkgadd').click(function () {
            var name = $('#pkgname').val();
            var width = $('#pkgwidth').val();
            var height = $('#pkgheight').val();
            var depth = $('#pkgdepth').val();
            var weight = $('#pkgweight').val();
            var cost = $('#pkgcost').val();

            $('#pkglist').append('<tr data-index="'+pkgcount+'">');
                $('#pkglist tr[data-index="'+pkgcount+'"]').append("<td>"+name+"</td>");
                $('#pkglist tr[data-index="'+pkgcount+'"]').append("<td>"+width+"</td>");
                $('#pkglist tr[data-index="'+pkgcount+'"]').append("<td>"+height+"</td>");
                $('#pkglist tr[data-index="'+pkgcount+'"]').append("<td>"+depth+"</td>");
                $('#pkglist tr[data-index="'+pkgcount+'"]').append("<td>"+weight+"</td>");
                $('#pkglist tr[data-index="'+pkgcount+'"]').append("<td>"+cost+"</td>");
                $('#pkglist tr[data-index="'+pkgcount+'"]').append('<input type="hidden" name="packages['+pkgcount+'][name]" value="'+name+'" />');
                $('#pkglist tr[data-index="'+pkgcount+'"]').append('<input type="hidden" name="packages['+pkgcount+'][width]" value="'+width+'" />');
                $('#pkglist tr[data-index="'+pkgcount+'"]').append('<input type="hidden" name="packages['+pkgcount+'][height]" value="'+height+'" />');
                $('#pkglist tr[data-index="'+pkgcount+'"]').append('<input type="hidden" name="packages['+pkgcount+'][depth]" value="'+depth+'" />');
                $('#pkglist tr[data-index="'+pkgcount+'"]').append('<input type="hidden" name="packages['+pkgcount+'][weight]" value="'+weight+'" />');
                $('#pkglist tr[data-index="'+pkgcount+'"]').append('<input type="hidden" name="packages['+pkgcount+'][cost]" value="'+cost+'" />');
            $('#pkglist').append("</tr>");

            pkgcount++;

            clearPkg();
        });

        $('#pkgclear').click(clearPkg);
        </script>
    </body>
</html>
