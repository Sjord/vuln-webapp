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
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <div id="nopackageswarning" class="notification">
                                        This shipment currently has no packages!
                                    </div>

                                    <div class="columns">
                                        <div class="column is-8">
                                            <label class="label" for="name">Name</label>
                                            <p class="control">
                                                <input class="input" type="text" name="name" />
                                            </p>
                                            <label class="label">Width, Height, Depth (cm)</label>
                                            <div class="control is-grouped">
                                                <p class="control is-expanded">
                                                    <input class="input" type="text" name="width" placeholder="Width"/>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input class="input" type="text" name="height" placeholder="Height"/>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input class="input" type="text" name="depth" placeholder="Depth"/>
                                                </p>
                                            </div>

                                            <label class="label">Weight (g)</label>
                                            <p class="control">
                                                <input class="input" type="text" name="weight" />
                                            </p>
                                        </div>
                                        <div class="column is-4">
                                            <label class="label">Cost</label>
                                            <p class="control">
                                                <input class="input" disabled type="text" name="cost" />
                                            </p>
                                            <a class="button is-primary">Add</a>
                                            <a class="button is-danger">Clear</a>
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

                                <label class="label">Total cost</label>
                                <p class="subtitle is-2">£23.56</p>

                                <div class="control is-grouped">
                                    <p class="control">
                                        <button class="button is-large is-primary">Submit</button>
                                    </p>

                                    <p class="control">
                                        <button class="button is-large is-link">Cancel</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
