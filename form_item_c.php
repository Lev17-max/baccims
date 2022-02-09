<div class="row">
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label>FAMILY NAME:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-faname" name="item-c-family-name[]" required>
            </div>
        </div>

    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label>FIRST NAME:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-fname" name="item-c-first-name[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>MIDDLE NAME:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-mname" name="item-c-middle-name[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>QUALIFIER:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control  input-item-c input-item-c-qual" name="item-c-qualifier[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>NICKNAME:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-nname" name="item-c-nickname[]" required>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-12 col-lg-2">
        <div class="form-group">
            <label>CITIZENSHIP:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-cship" name="item-c-citizenship[]" required>
            </div>
        </div>

    </div>
    <div class="col-lg-1">
        <div class="form-group">
            <label>SEX:</label>
            <div class="input-group mb-3">
                <select class="form-control input-item-c input-item-c-gender" name="item-c-gender[]" required>
                    <option selected disabled value="">Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>CIVIL STATUS:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-cstats" name="item-c-civil-status[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>DATE OF BIRTH:</label>
            <div class="input-group mb-3">
                <input type="date" class="form-control  input-item-c  input-item-c-bdate"  name="item-c-birthday[]"  required>
            </div>
        </div>
    </div>
    <div class="col-lg-1">
        <div class="form-group">
            <label>AGE:</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control input-item-c input-item-c-age" min="10" max="100" name="item-c-age[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>PLACE OF BIRTH:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control  input-item-c input-item-c-place-bday" name="item-c-pbd[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>HOME PHONE:</label>
            <div class="input-group mb-3">
                <input type="Tel"  placeholder="Format: 123-456-7890" title="Telephone number should be separated by dash" class="form-control input-item-c input-item-c-home-num suspect-num" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       required name="item-c-home-phone[]" required>
            </div>
        </div>
    </div>
    <label>MOBILE PHONE:</label>
    <div class="col-lg-2">
        <div class="input-group form-group " style="position: relative;">
            <input type="tel" class="form-control phone-a phone input-item-c input-item-c-mobile-num" name="item-c-mobile-phone[]" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
            <span class="countrycode2" >
                +63 </span>
            <div  class=" phone-icon input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label>CURRENT ADDRESS(STREET):</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-curr-addr" name="item-c-current-addrs[]" required>
            </div>
        </div>

    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label>VILLAGE SITIO:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-sit" name="item-c-sitio[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>BARANGAY:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c  input-item-c-brgy" name="item-c-barangay[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>TOWN/CITY:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-city" name="item-c-city[]" required>
            </div>

        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>PROVINCE:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control  input-item-c input-item-c-prov" name="item-c-province[]" required >
            </div>
        </div>
    </div>

</div>
<hr>


<div class="row other-address-item-c">
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label>OTHER ADDRESS(STREET):</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-oth-addr" name="item-c-other-addrs[]" required>
            </div>
        </div>

    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label>VILLAGE SITIO:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-sit2" name="item-c-sitio2[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>BARANGAY:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-brgy2" name="item-c-barangay2[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>TOWN/CITY:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-city2" name="item-c-city2[]" required>
            </div>

        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label>PROVINCE:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-prov2" name="item-c-province2[]" required>
            </div>
        </div>
    </div>
    <hr>
</div>



<div class="row">
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label>HIGHEST EDUCATIONAL ATTAINMENT:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-educ" name="item-c-educ[]" required>
            </div>
        </div>

    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label>OCCUPATION:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-occ" name="item-c-work[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label>ID CARD PRESENTED:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control input-item-c input-item-c-id-press" name="item-c-id-bought[]" required>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label>EMAIL ADDRESS:</label>
            <div class="input-group mb-3">
                <input type="email" class="form-control input-item-c input-item-c-email" name="item-c-email[]" required>
            </div>

        </div>
    </div>
</div>