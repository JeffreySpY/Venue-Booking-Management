<?php

/*
Template Name: booking form
*/

?>
<?php get_header(); ?>



<form method="POST"  action="https://dev.u20s1035.monash-ie.me/booking-form/booking-form-data-test/" >
        <div class="sb-widget-inner">
        <div class="form-group input-group">
        <ul>
            
            <li>
                <label>ATTENDEES</label>
                <div>
                <input type="number" name="Cus_attendess" id="attendess" class="form-control form-widget">
                </div>
            </li>
            </br>
            
            
            <li>
                <label>START TIME</label>
                <input type="time" name="Cus_start_time" id="start_time" class="form-control form-widget">
                <label>DURATION (mins)</label>
                <input type="number" name="Cus_duration" id="duration" placeholder=" mins" class="form-control form-widget">
            </li>
            </br>
            
            <li>
                <label>NAME</label>
                <div>
                <input type="text" name="Cus_name" id="name">
                </div>
            </li>
            </br>
            
            <li>
                <label>COMPANY</label>
                <div>
                <input type="text" name="Cus_company" id="company">
                </div>
            </li>
            </br>
            
            <li>
                <label>EMAIL</label>
                <div>
                <input type="email" name="Cus_email" id="email" placeholder="name@example.com">
                </div>
            </li>
            </br>
            
            <li>
                <label>MOBILE</label>
                <div>
                <input type="tel" name="Cus_mobile" id="mobile" >
                </div>
            </li>
            </br>
            
            <li>
                <label>WORK No.</label>
                <div>
                <input type="tel" name="Cus_workNO" id="workNO">
                </div>
            </li>
            </br>
            
            <li>
                <label>PACKAGE</label>
                <textbox></textbox>
                <a href="">Change Package</a>
            </li>
            
            <li>
                <span class="input-group-btn">
                <input type="submit" class="custom-btn book-sm" style="background-color:#dbb26b"> Submit<i class="fa fa-chevron-circle-right"></i>></input>
                </span>
            </li>
        </ul>
        
        </div>
        </div>
        <ul class="form-section page-section">
      <li id="cid_14" class="form-input-wide" data-type="control_head">
        <div class="form-header-group  header-large">
          <div class="header-text httal htvam">
            <h1 id="header_14" class="form-header" data-component="header">
              Venue Booking
            </h1>
          </div>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_fullname" id="id_16">
        <label class="form-label form-label-left form-label-auto" id="label_16" for="first_16">
          Name
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_16" class="form-input jf-required">
          <div data-wrapper-react="true">
            <span class="form-sub-label-container " style="vertical-align:top" data-input-type="first">
              <input type="text" id="first_16" name="q16_name[first]" class="form-textbox validate[required]" size="10" value="" data-component="first" aria-labelledby="label_16 sublabel_16_first" required="">
              <label class="form-sub-label" for="first_16" id="sublabel_16_first" style="min-height:13px" aria-hidden="false"> First Name </label>
            </span>
            <span class="form-sub-label-container " style="vertical-align:top" data-input-type="last">
              <input type="text" id="last_16" name="q16_name[last]" class="form-textbox validate[required]" size="15" value="" data-component="last" aria-labelledby="label_16 sublabel_16_last" required="">
              <label class="form-sub-label" for="last_16" id="sublabel_16_last" style="min-height:13px" aria-hidden="false"> Last Name </label>
            </span>
          </div>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_email" id="id_17">
        <label class="form-label form-label-left form-label-auto" id="label_17" for="input_17">
          E-mail
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_17" class="form-input jf-required">
          <input type="email" id="input_17" name="q17_email17" class="form-textbox validate[required, Email]" size="32" value="" placeholder="ex: myname@example.com" data-component="email" aria-labelledby="label_17" required="">
        </div>
      </li>

      <li class="form-line jf-required" data-type="control_spinner" id="id_18">
        <label class="form-label form-label-left form-label-auto" id="label_18" for="input_18">
          Number of Guests
          <span class="form-required">
            *
          </span>
          
        </label>
        <div id="cid_17" class="form-input jf-required">
        <input type="number">
        </div>
      </li>
      <li>
          <label>
              Selected Package
          </label>
          <h4><?php echo $packageID; ?></h4>
      </li>
      <li>
          <label class="form-label form-label-left form-label-auto">
              Mobile No.
              <span class="form-required">
                *
              </span>
          </label>
          <div class="form-input jf-required">
              <input type="tel">
          </div>
          
      </li>
      
      <li class="form-line" data-type="control_button" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="text-align:center" data-align="center" class="form-buttons-wrapper form-buttons-center   jsTest-button-wrapperField">
            <button id="input_2" type="submit" class="form-submit-button submit-button jf-form-buttons jsTest-submitField" data-component="button" data-content="">
              Submit
            </button>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="">
      </li>
    </ul>
    </form>
    
<?php get_footer(); ?>