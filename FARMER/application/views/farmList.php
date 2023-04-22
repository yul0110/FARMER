
        <script src="../../assets/js/farmDiary/farmDiary.js"></script>

        <div class="container-fluid mt-15">

            <div class="card mb-15">
                <div class="card-body">
                    <h4 class="card-title">Forms</h4>
                    <p>
                        Examples and usage guidelines for form control styles, layout options, and custom components for
                        creating a wide variety of forms.
                    </p>

                    <hr>

                    <h4>Overview</h4>

                    <p>Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to
                        opt into their customized displays for a more consistent rendering across browsers and devices.
                    </p>

                    <p>Be sure to use an appropriate <code>type</code> attribute on all inputs (e.g., <code>email</code>
                        for email address or <code>number</code> for numerical information) to take advantage of newer
                        input controls like email verification, number selection, and more.</p>


                    <hr>

                    <h4>Input</h4>

                    <p>
                        A basic form control with disabled and readonly mode.
                    </p>

                    <div class="row">
                        <div class="mb-15 col-sm-6">
                            <input type="text" class="form-control" placeholder="Input box">
                        </div>
                        <div class="mb-15 col-sm-6">
                            <input type="text" class="form-control" placeholder="Input box (disabled)" disabled="">
                        </div>
                        <div class="mb-15 col-sm-6">
                            <textarea class="form-control" rows="2" placeholder="Textarea"></textarea>
                        </div>
                        <div class="mb-15 col-sm-6">
                            <textarea class="form-control" rows="2" placeholder="Textarea (disabled)"
                                disabled=""></textarea>
                        </div>
                    </div>

                    <pre class="my-30">
            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Input box&quot;&gt;
            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Input box (disabled)&quot; disabled&gt;
            &lt;textarea class=&quot;form-control&quot; rows=&quot;2&quot; placeholder=&quot;Textarea&quot;&gt;&lt;/textarea&gt;
            &lt;textarea class=&quot;form-control&quot; rows=&quot;2&quot; placeholder=&quot;Textarea (disabled)&quot; disabled&gt;&lt;/textarea&gt;
                    </pre>

                    <h4>
                        Validation State
                    </h4>

                    <p>A form control with success, warning and error state.</p>

                    <form class="was-validated">
                        <div class="row">
                            <div class="mb-15 col-sm-6">
                                <input type="text" class="form-control" placeholder="Valid state">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="mb-15 col-sm-6">
                                <input type="text" class="form-control" placeholder="Invalid state" required="">
                                <div class="invalid-feedback">This is required</div>
                            </div>
                            <div class="mb-15 col-sm-6">
                                <textarea class="form-control" rows="2" placeholder="Valid state"></textarea>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="mb-15 col-sm-6">
                                <textarea class="form-control" rows="2" placeholder="Invalid state"
                                    required=""></textarea>
                                <div class="invalid-feedback">This is required</div>
                            </div>
                        </div>
                    </form>

                    <pre class="my-30">
            &lt;form class=&quot;was-validated&quot;&gt;
            &lt;div class=&quot;row&quot;&gt;
            &lt;div class=&quot;mb-15 col-sm-6&quot;&gt;
            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Valid state&quot;&gt;
            &lt;div class=&quot;valid-feedback&quot;&gt;Looks good!&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 col-sm-6&quot;&gt;
            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Invalid state&quot; required=&quot;&quot;&gt;
            &lt;div class=&quot;invalid-feedback&quot;&gt;This is required&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 col-sm-6&quot;&gt;
            &lt;textarea class=&quot;form-control&quot; rows=&quot;2&quot; placeholder=&quot;Valid state&quot;&gt;&lt;/textarea&gt;
            &lt;div class=&quot;valid-feedback&quot;&gt;Looks good!&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 col-sm-6&quot;&gt;
            &lt;textarea class=&quot;form-control&quot; rows=&quot;2&quot; placeholder=&quot;Invalid state&quot;
                required=&quot;&quot;&gt;&lt;/textarea&gt;
            &lt;div class=&quot;invalid-feedback&quot;&gt;This is required&lt;/div&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;/form&gt;                    </pre>


                    <hr>

                    <h4> Checkboxes </h4>
                    <p> For even more customization and cross browser consistency, use our completely custom checkbox
                        element to replace the browser defaults.</p>

                    <div class="d-flex">
                        <div class="mr-30">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                <label class="form-check-label" for="customCheck1">Custom checkbox</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck2" disabled="">
                                <label class="form-check-label" for="customCheck2">Custom checkbox
                                    (disabled)</label>
                            </div>
                        </div>
                        <div class="mr-30">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck3" checked="">
                                <label class="form-check-label" for="customCheck3">Custom checkbox (checked)</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck4" checked=""
                                    disabled="">
                                <label class="form-check-label" for="customCheck4">Custom checkbox (checked
                                    disabled)</label>
                            </div>
                        </div>
                    </div>


                    <pre class="my-30">
            &lt;div class=&quot;form-check&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck1&quot;&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck1&quot;&gt;Custom checkbox&lt;/label&gt;
            &lt;/div&gt;

            &lt;div class=&quot;form-check&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck2&quot; disabled&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck2&quot;&gt;Custom checkbox (disabled)&lt;/label&gt;
            &lt;/div&gt;

            &lt;div class=&quot;form-check&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck3&quot; checked&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck3&quot;&gt;Custom checkbox (checked)&lt;/label&gt;
            &lt;/div&gt;

            &lt;div class=&quot;form-check&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck4&quot; checked disabled&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck4&quot;&gt;Custom checkbox (checked disabled)&lt;/label&gt;
            &lt;/div&gt;
                    </pre>

                    <hr>

                    <h4>Radios</h4>

                    <p>For even more customization and cross browser consistency, use our completely custom radio
                        element to replace the browser defaults.</p>

                    <div class="d-flex">
                        <div class="mr-30">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="form-check-input"
                                    checked="">
                                <label class="form-check-label" for="customRadio1">Custom radio</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                <label class="form-check-label" for="customRadio2">Custom radio</label>
                            </div>
                        </div>
                        <div class="mr-30">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="customRadio2" class="form-check-input"
                                    checked="" disabled="">
                                <label class="form-check-label" for="customRadio3">Custom radio (disabled)</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="customRadio2" class="form-check-input"
                                    disabled="">
                                <label class="form-check-label" for="customRadio4">Custom radio (disabled)</label>
                            </div>
                        </div>
                    </div>

                    <pre class="my-30">
            &lt;div class=&quot;custom-control custom-radio&quot;&gt;
            &lt;input type=&quot;radio&quot; id=&quot;customRadio1&quot; name=&quot;customRadio&quot; class=&quot;form-check-input&quot; checked&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio1&quot;&gt;Custom radio&lt;/label&gt;
            &lt;/div&gt;

            &lt;div class=&quot;custom-control custom-radio&quot;&gt;
            &lt;input type=&quot;radio&quot; id=&quot;customRadio2&quot; name=&quot;customRadio&quot; class=&quot;form-check-input&quot;&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio2&quot;&gt;Custom radio&lt;/label&gt;
            &lt;/div&gt;

            &lt;div class=&quot;custom-control custom-radio&quot;&gt;
            &lt;input type=&quot;radio&quot; id=&quot;customRadio3&quot; name=&quot;customRadio2&quot; class=&quot;form-check-input&quot; checked disabled&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio3&quot;&gt;Custom radio&lt;/label&gt;
            &lt;/div&gt;

            &lt;div class=&quot;custom-control custom-radio&quot;&gt;
            &lt;input type=&quot;radio&quot; id=&quot;customRadio4&quot; name=&quot;customRadio2&quot; class=&quot;form-check-input&quot; disabled&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customRadio4&quot;&gt;Custom radio&lt;/label&gt;
            &lt;/div&gt;
                    </pre>

                    <hr>

                    <h4>Switches</h4>
                    <p>A switch has the markup of a custom checkbox but uses the <code>.custom-switch</code> class to
                        render a toggle switch. Switches also support the disabled attribute.</p>

                    <div class="d-flex">
                        <div class="mr-30">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="customSwitch1">
                                <label class="form-check-label" for="customSwitch1">Toggle this switch
                                    element</label>
                            </div>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" disabled="" id="customSwitch2">
                                <label class="form-check-label" for="customSwitch2">Disabled switch element</label>
                            </div>
                        </div>
                        <div class="mr-30">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="customSwitch3" checked="">
                                <label class="form-check-label" for="customSwitch3">Toggle this switch
                                    element</label>
                            </div>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" disabled="" id="customSwitch4"
                                    checked="">
                                <label class="form-check-label" for="customSwitch4">Disabled switch element</label>
                            </div>
                        </div>
                    </div>

                    <pre class="my-30">
            &lt;div class=&quot;form-check form-switch&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customSwitch1&quot;&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customSwitch1&quot;&gt;Toggle this switch element&lt;/label&gt;
            &lt;/div&gt;

            &lt;div class=&quot;form-check form-switch&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; disabled id=&quot;customSwitch2&quot;&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customSwitch2&quot;&gt;Disabled switch element&lt;/label&gt;
            &lt;/div&gt;

            &lt;div class=&quot;form-check form-switch&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customSwitch3&quot; checked&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customSwitch3&quot;&gt;Toggle this switch element&lt;/label&gt;
            &lt;/div&gt;

            &lt;div class=&quot;form-check form-switch&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; disabled id=&quot;customSwitch4&quot; checked disabled&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customSwitch4&quot;&gt;Disabled switch element&lt;/label&gt;
            &lt;/div&gt;
                    </pre>


                    <hr>

                    <h4>Range</h4>

                    <p>Create custom range controls with <code>.form-range</code>. The track (the background) and
                        thumb (the value) are both styled to appear the same across browsers.</p>

                    <input type="range" class="form-range" id="customRange1">


                    <hr>



                </div>
            </div>


            <div class="row">
                <div class="col-xxl-6 col-12">
                    <div class="card mb-15">
                        <div class="card-body">
                            <h4>File Browser </h4>
                            <p>
                                The file input is the most gnarly of the bunch and requires additional JavaScript if
                                you’d like
                                to hook them up with functional Choose file… and selected file name text.
                            </p>

                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile">
                                <label class="form-file-label" for="customFile">
                                    <span class="form-file-text">Choose file...</span>
                                    <span class="form-file-button">Browse</span>
                                </label>
                            </div>

                            <pre class="my-30">
            &#x3C;div class=&#x22;form-file&#x22;&#x3E;
            &#x3C;input type=&#x22;file&#x22; class=&#x22;form-file-input&#x22; id=&#x22;customFile&#x22;&#x3E;
            &#x3C;label class=&#x22;form-file-label&#x22; for=&#x22;customFile&#x22;&#x3E;
            &#x3C;span class=&#x22;form-file-text&#x22;&#x3E;Choose file...&#x3C;/span&#x3E;
            &#x3C;span class=&#x22;form-file-button&#x22;&#x3E;Browse&#x3C;/span&#x3E;
            &#x3C;/label&#x3E;
            &#x3C;/div&#x3E;
                            </pre>
                        </div>
                    </div>
                </div>


                <div class="col-xxl-6 col-12">
                    <div class="card mb-15">
                        <div class="card-body">
                            <h4>Select</h4>
                            <p>
                                Custom select menus need only a custom class, <code>.form-select</code> to trigger the
                                custom
                                styles.
                            </p>

                            <select class="form-select">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                            <pre class="my-30">
            &lt;select class=&quot;form-select&quot;&gt;
            &lt;option selected&gt;Open this select menu&lt;/option&gt;
            &lt;option value=&quot;1&quot;&gt;One&lt;/option&gt;
            &lt;option value=&quot;2&quot;&gt;Two&lt;/option&gt;
            &lt;option value=&quot;3&quot;&gt;Three&lt;/option&gt;
            &lt;/select&gt;
                    </pre>
                        </div>
                    </div>
                </div>


            </div>

            <div class="card mb-15">
                <div class="card-body">
                    <h4>Input Sizes & Group</h4>
                    <p>
                        Set heights using classes like <code>.input-lg</code>, and set widths using grid column
                        classes like <code>.col-lg-*</code>.
                    </p>

                    <form role="form" class="form-horizontal">
                        <div class="mb-15 row">
                            <label class="col-sm-2 col-form-label" for="example-input-small">Small</label>
                            <div class="col-sm-10">
                                <input type="text" id="example-input-small" name="example-input-small"
                                    class="form-control form-control-sm" placeholder=".input-sm">
                            </div>
                        </div>

                        <div class="mb-15 row">
                            <label class="col-sm-2 col-form-label" for="example-input-normal">Normal</label>
                            <div class="col-sm-10">
                                <input type="text" id="example-input-normal" name="example-input-normal"
                                    class="form-control" placeholder="Normal">
                            </div>
                        </div>

                        <div class="mb-15 row">
                            <label class="col-sm-2 col-form-label" for="example-input-large">Large</label>
                            <div class="col-sm-10">
                                <input type="text" id="example-input-large" name="example-input-large"
                                    class="form-control form-control-lg" placeholder=".input-lg">
                            </div>
                        </div>

                        <div class="mb-15 row">
                            <label class="col-sm-2 col-form-label">Grid Sizes</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder=".col-sm-4">
                            </div>
                        </div>

                        <div class="mb-15 row">
                            <label class="col-sm-2 col-form-label">Static</label>
                            <div class="col-sm-10">
                                <div class="input-group">

                                    <span class="input-group-text" id="basic-addon1">@</span>

                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="mb-15 row">
                            <label class="col-sm-2 col-form-label">Dropdowns</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                
                                        <button class="btn btn-primary  dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Dropdown</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="basic-addon1">
                                </div>

                            </div>
                        </div>

                        <div class="mb-15 row mb-0">
                            <label class="col-sm-2 col-form-label">Buttons</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Recipient's username"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                
                                        <button class="btn btn-dark" type="button">Button</button>
                                
                                </div>
                            </div>
                        </div>

                    </form>

                    <pre class="my-30">
            &#x3C;form role=&#x22;form&#x22; class=&#x22;form-horizontal&#x22;&#x3E;
            &#x3C;div class=&#x22;mb-15 row&#x22;&#x3E;
            &#x3C;label class=&#x22;col-sm-2 col-form-label&#x22; for=&#x22;example-input-small&#x22;&#x3E;Small&#x3C;/label&#x3E;
            &#x3C;div class=&#x22;col-sm-10&#x22;&#x3E;
            &#x3C;input type=&#x22;text&#x22; id=&#x22;example-input-small&#x22; name=&#x22;example-input-small&#x22;
            class=&#x22;form-control form-control-sm&#x22; placeholder=&#x22;.input-sm&#x22;&#x3E;
            &#x3C;/div&#x3E;
            &#x3C;/div&#x3E;

            &#x3C;div class=&#x22;mb-15 row&#x22;&#x3E;
            &#x3C;label class=&#x22;col-sm-2 col-form-label&#x22; for=&#x22;example-input-normal&#x22;&#x3E;Normal&#x3C;/label&#x3E;
            &#x3C;div class=&#x22;col-sm-10&#x22;&#x3E;
            &#x3C;input type=&#x22;text&#x22; id=&#x22;example-input-normal&#x22; name=&#x22;example-input-normal&#x22;
            class=&#x22;form-control&#x22; placeholder=&#x22;Normal&#x22;&#x3E;
            &#x3C;/div&#x3E;
            &#x3C;/div&#x3E;

            &#x3C;div class=&#x22;mb-15 row&#x22;&#x3E;
            &#x3C;label class=&#x22;col-sm-2 col-form-label&#x22; for=&#x22;example-input-large&#x22;&#x3E;Large&#x3C;/label&#x3E;
            &#x3C;div class=&#x22;col-sm-10&#x22;&#x3E;
            &#x3C;input type=&#x22;text&#x22; id=&#x22;example-input-large&#x22; name=&#x22;example-input-large&#x22;
            class=&#x22;form-control form-control-lg&#x22; placeholder=&#x22;.input-lg&#x22;&#x3E;
            &#x3C;/div&#x3E;
            &#x3C;/div&#x3E;

            &#x3C;div class=&#x22;mb-15 row&#x22;&#x3E;
            &#x3C;label class=&#x22;col-sm-2 col-form-label&#x22;&#x3E;Grid Sizes&#x3C;/label&#x3E;
            &#x3C;div class=&#x22;col-sm-4&#x22;&#x3E;
            &#x3C;input type=&#x22;text&#x22; class=&#x22;form-control&#x22; placeholder=&#x22;.col-sm-4&#x22;&#x3E;
            &#x3C;/div&#x3E;
            &#x3C;/div&#x3E;

            &#x3C;div class=&#x22;mb-15 row&#x22;&#x3E;
            &#x3C;label class=&#x22;col-sm-2 col-form-label&#x22;&#x3E;Static&#x3C;/label&#x3E;
            &#x3C;div class=&#x22;col-sm-10&#x22;&#x3E;
            &#x3C;div class=&#x22;input-group&#x22;&#x3E;

            &#x3C;span class=&#x22;input-group-text&#x22; id=&#x22;basic-addon1&#x22;&#x3E;@&#x3C;/span&#x3E;

            &#x3C;input type=&#x22;text&#x22; class=&#x22;form-control&#x22; placeholder=&#x22;Username&#x22; aria-label=&#x22;Username&#x22;
            aria-describedby=&#x22;basic-addon1&#x22;&#x3E;
            &#x3C;/div&#x3E;
            &#x3C;/div&#x3E;
            &#x3C;/div&#x3E;

            &#x3C;div class=&#x22;mb-15 row&#x22;&#x3E;
            &#x3C;label class=&#x22;col-sm-2 col-form-label&#x22;&#x3E;Dropdowns&#x3C;/label&#x3E;
            &#x3C;div class=&#x22;col-sm-10&#x22;&#x3E;
            &#x3C;div class=&#x22;input-group mb-3&#x22;&#x3E;

            &#x3C;button class=&#x22;btn btn-primary  dropdown-toggle&#x22; type=&#x22;button&#x22;
                data-toggle=&#x22;dropdown&#x22; aria-haspopup=&#x22;true&#x22;
                aria-expanded=&#x22;false&#x22;&#x3E;Dropdown&#x3C;/button&#x3E;
            &#x3C;div class=&#x22;dropdown-menu&#x22;&#x3E;
                &#x3C;a class=&#x22;dropdown-item&#x22; href=&#x22;#&#x22;&#x3E;Action&#x3C;/a&#x3E;
                &#x3C;a class=&#x22;dropdown-item&#x22; href=&#x22;#&#x22;&#x3E;Another action&#x3C;/a&#x3E;
                &#x3C;a class=&#x22;dropdown-item&#x22; href=&#x22;#&#x22;&#x3E;Something else here&#x3C;/a&#x3E;
                &#x3C;div role=&#x22;separator&#x22; class=&#x22;dropdown-divider&#x22;&#x3E;&#x3C;/div&#x3E;
                &#x3C;a class=&#x22;dropdown-item&#x22; href=&#x22;#&#x22;&#x3E;Separated link&#x3C;/a&#x3E;
            &#x3C;/div&#x3E;

            &#x3C;input type=&#x22;text&#x22; class=&#x22;form-control&#x22; placeholder=&#x22;&#x22; aria-label=&#x22;&#x22;
            aria-describedby=&#x22;basic-addon1&#x22;&#x3E;
            &#x3C;/div&#x3E;

            &#x3C;/div&#x3E;
            &#x3C;/div&#x3E;

            &#x3C;div class=&#x22;mb-15 row mb-0&#x22;&#x3E;
            &#x3C;label class=&#x22;col-sm-2 col-form-label&#x22;&#x3E;Buttons&#x3C;/label&#x3E;
            &#x3C;div class=&#x22;col-sm-10&#x22;&#x3E;
            &#x3C;div class=&#x22;input-group&#x22;&#x3E;
            &#x3C;input type=&#x22;text&#x22; class=&#x22;form-control&#x22; placeholder=&#x22;Recipient&#x27;s username&#x22;
            aria-label=&#x22;Recipient&#x27;s username&#x22; aria-describedby=&#x22;basic-addon2&#x22;&#x3E;

            &#x3C;button class=&#x22;btn btn-dark&#x22; type=&#x22;button&#x22;&#x3E;Button&#x3C;/button&#x3E;

            &#x3C;/div&#x3E;
            &#x3C;/div&#x3E;
            &#x3C;/div&#x3E;

            &#x3C;/form&#x3E;
                    </pre>
                </div>
            </div>


            <div class="card mb-15">
                <div class="card-body">
                    <h4>Basic</h4>
                    <form role="form">
                        <div class="mb-15">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="mb-15">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <div class="mb-15">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember login
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <pre class="my-30">
            &lt;form role=&quot;form&quot;&gt;
            &lt;div class=&quot;mb-15&quot;&gt;
            &lt;label for=&quot;exampleInputEmail1&quot;&gt;Email address&lt;/label&gt;
            &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;exampleInputEmail1&quot;
            aria-describedby=&quot;emailHelp&quot; placeholder=&quot;Enter email&quot;&gt;
            &lt;small id=&quot;emailHelp&quot; class=&quot;form-text text-muted&quot;&gt;We&apos;ll never share your email with anyone
            else.&lt;/small&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15&quot;&gt;
            &lt;label for=&quot;exampleInputPassword1&quot;&gt;Password&lt;/label&gt;
            &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;exampleInputPassword1&quot;
            placeholder=&quot;Password&quot;&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15&quot;&gt;
            &lt;div class=&quot;checkbox&quot;&gt;
            &lt;input id=&quot;checkbox0&quot; type=&quot;checkbox&quot;&gt;
            &lt;label for=&quot;checkbox0&quot;&gt;
                Check me out
            &lt;/label&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;Submit&lt;/button&gt;
            &lt;/form&gt;
                    </pre>
                </div>
            </div>


            <div class="card mb-15">
                <div class="card-body">
                    <h4>Horizontal</h4>
                    <form class="form-horizontal" role="form">
                        <div class="mb-15 row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="mb-15 row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="mb-15 row">
                            <label for="inputPassword5" class="col-sm-3 col-form-label">Re Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword5"
                                    placeholder="Retype Password">
                            </div>
                        </div>
                        <div class="mb-15 row justify-content-end">
                            <div class="col-sm-9">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="checkbox2">
                                        Check me out !
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-15 mb-0 justify-content-end row">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info">Sign in</button>
                            </div>
                        </div>
                    </form>

                    <pre class="my-30">
            &lt;form class=&quot;form-horizontal&quot; role=&quot;form&quot;&gt;
            &lt;div class=&quot;mb-15 row&quot;&gt;
            &lt;label for=&quot;inputEmail3&quot; class=&quot;col-sm-3 col-form-label&quot;&gt;Email&lt;/label&gt;
            &lt;div class=&quot;col-sm-9&quot;&gt;
            &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;inputEmail3&quot; placeholder=&quot;Email&quot;&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 row&quot;&gt;
            &lt;label for=&quot;inputPassword3&quot; class=&quot;col-sm-3 col-form-label&quot;&gt;Password&lt;/label&gt;
            &lt;div class=&quot;col-sm-9&quot;&gt;
            &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;inputPassword3&quot; placeholder=&quot;Password&quot;&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 row&quot;&gt;
            &lt;label for=&quot;inputPassword5&quot; class=&quot;col-sm-3 col-form-label&quot;&gt;Re Password&lt;/label&gt;
            &lt;div class=&quot;col-sm-9&quot;&gt;
            &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;inputPassword5&quot;
                placeholder=&quot;Retype Password&quot;&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 row justify-content-end&quot;&gt;
            &lt;div class=&quot;col-sm-9&quot;&gt;
            &lt;div class=&quot;checkbox checkbox-primary&quot;&gt;
                &lt;input id=&quot;checkbox2&quot; type=&quot;checkbox&quot;&gt;
                &lt;label for=&quot;checkbox2&quot;&gt;
                    Check me out !
                &lt;/label&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 mb-0 justify-content-end row&quot;&gt;
            &lt;div class=&quot;col-sm-9&quot;&gt;
            &lt;button type=&quot;submit&quot; class=&quot;btn btn-info&quot;&gt;Sign in&lt;/button&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;/form&gt;
                    </pre>
                </div>
            </div>


            <div class="card mb-15">
                <div class="card-body">
                    <h4>Form Grid</h4>
                    <p>
                        You may also swap <code class="highlighter-rouge">.row</code>, a variation of our standard grid
                        row that
                        overrides the default column gutters for tighter and more compact layouts.
                    </p>

                    <form>
                        <div class="row">
                            <div class="mb-15 col-md-6">
                                <label for="inputEmail4" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="mb-15 col-md-6">
                                <label for="inputPassword4" class="col-form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="mb-15">
                            <label for="inputAddress" class="col-form-label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="mb-15">
                            <label for="inputAddress2" class="col-form-label">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="row">
                            <div class="mb-15 col-md-6">
                                <label for="inputCity" class="col-form-label">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="mb-15 col-md-4">
                                <label for="inputState" class="col-form-label">State</label>
                                <select id="inputState" class="form-control">
                                    <option>Choose</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>

                                </select>
                            </div>
                            <div class="mb-15 col-md-2">
                                <label for="inputZip" class="col-form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="mb-15">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck11">
                                <label class="form-check-label" for="customCheck11">Check this custom
                                    checkbox</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>

                    <pre class="my-30"><code>
            &lt;form&gt;
            &lt;div class=&quot;row&quot;&gt;
            &lt;div class=&quot;mb-15 col-md-6&quot;&gt;
            &lt;label for=&quot;inputEmail4&quot; class=&quot;col-form-label&quot;&gt;Email&lt;/label&gt;
            &lt;input type=&quot;email&quot; class=&quot;form-control&quot; id=&quot;inputEmail4&quot; placeholder=&quot;Email&quot;&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 col-md-6&quot;&gt;
            &lt;label for=&quot;inputPassword4&quot; class=&quot;col-form-label&quot;&gt;Password&lt;/label&gt;
            &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;inputPassword4&quot; placeholder=&quot;Password&quot;&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15&quot;&gt;
            &lt;label for=&quot;inputAddress&quot; class=&quot;col-form-label&quot;&gt;Address&lt;/label&gt;
            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;inputAddress&quot; placeholder=&quot;1234 Main St&quot;&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15&quot;&gt;
            &lt;label for=&quot;inputAddress2&quot; class=&quot;col-form-label&quot;&gt;Address 2&lt;/label&gt;
            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;inputAddress2&quot;
            placeholder=&quot;Apartment, studio, or floor&quot;&gt;
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
            &lt;div class=&quot;mb-15 col-md-6&quot;&gt;
            &lt;label for=&quot;inputCity&quot; class=&quot;col-form-label&quot;&gt;City&lt;/label&gt;
            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;inputCity&quot;&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 col-md-4&quot;&gt;
            &lt;label for=&quot;inputState&quot; class=&quot;col-form-label&quot;&gt;State&lt;/label&gt;
            &lt;select id=&quot;inputState&quot; class=&quot;form-control&quot;&gt;
                &lt;option&gt;Choose&lt;/option&gt;
                &lt;option&gt;Option 1&lt;/option&gt;
                &lt;option&gt;Option 2&lt;/option&gt;
                &lt;option&gt;Option 3&lt;/option&gt;

            &lt;/select&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15 col-md-2&quot;&gt;
            &lt;label for=&quot;inputZip&quot; class=&quot;col-form-label&quot;&gt;Zip&lt;/label&gt;
            &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;inputZip&quot;&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;mb-15&quot;&gt;
            &lt;div class=&quot;form-check&quot;&gt;
            &lt;input type=&quot;checkbox&quot; class=&quot;form-check-input&quot; id=&quot;customCheck11&quot;&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;customCheck11&quot;&gt;Check this custom
                checkbox&lt;/label&gt;
            &lt;/div&gt;
            &lt;/div&gt;
            &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;Sign in&lt;/button&gt;
            &lt;/form&gt;</code>
                    </pre>
                </div>
            </div>


        </div>

    </div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.4.0/dist/perfect-scrollbar.min.js"></script>


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-50750921-19"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-50750921-19');
        </script>



        <script src="../../js/morioh.js"></script>


    </body>
</html>