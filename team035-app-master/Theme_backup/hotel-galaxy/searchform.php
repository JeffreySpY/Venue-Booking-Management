<center>
<form method="get"  class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
 	<div class="sb-widget-inner" >
 		<div class="form-group input-group"   >
            <div >
          
                <label for="suburb" Suburb></label>  
                <input type="text" list="suburbs" id="suburb" name="suburb"  autocomplete="off"
                       class="form-control form-widget" placeholder="Location"/>  
                <datalist id="suburbs">
                    <?php foreach (getSuburbListForSearch() as $values) { ?>
                        <option value="<?php echo esc_attr($values); ?>">
                            <?php echo esc_html($values); ?>
                        </option>
                        <?php
                    } ?>
                </datalist>
                
                <label  for="category" Category></label>
                <input type="text" list="category" id="venue_category" name="venue_category"  autocomplete="off"
                       class="form-control form-widget" placeholder="Event Type"/>
                <datalist id="category">
                    <?php foreach (getCategoryListForSearch() as $values) { ?>
                        <option value="<?php echo esc_attr($values); ?>">
                            <?php echo esc_html($values); ?>
                        </option>
                        <?php
                    } ?>
                </datalist>
                
                <label  for="Size" Event Size></label>
                <input type="number" list="sizes" id="size" name="size" min="10" step="10" autocomplete="off"
                       class="form-control form-widget" placeholder="Event Size"/>
                <datalist id="sizes">
                    <?php foreach (getMaxEventSize() as $values) { ?>
                        <option value="<?php echo esc_attr($values); ?>">
                            <?php echo esc_html($values); ?>
                        </option>
                        <?php
                    } ?>
                </datalist>
                
                <label for="date" Date></label>
                <input style ="color: #9d9d9d"  type="date"  class="form-control form-widget"  id="date" name="date">
                
                
                <label for="time" Date></label>
                <input type="hidden" placeholder="Time" class="form-control form-widget">
                
                 <input   class="custom-btn book-sm" id="basic-addon2" value="Search" type="submit" style="background-color:#dbb26b"  ></input>

            </div >
            <hr>
            <p>
            <input type="hidden"  name="s" id="s"   class="form-control form-widget" placeholder="<?php esc_attr_e( "Search ", 'hotel-galaxy' ); ?>" />
 			<span class="input-group-btn"  >
                <!--<input type="<?php if(!is_front_page()){echo "submit";}else{echo "reset";}?>" name="reset" class="custom-btn book-sm" id="basic-addon2"  style="background-color:#dbb26b" value="<?php if(!is_front_page()){echo "Reset";}else{echo "Clear";}?>">Reset</input>-->
 			</span>
            </p>
 		</div>
 	</div>
 </form>
</center>
