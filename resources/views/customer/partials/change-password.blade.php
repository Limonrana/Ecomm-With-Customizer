<div class="myaccount-content">
    <h3>Password Change</h3>
    <div class="account-details-form">
        <div class="single-input-item">
            <label for="current-pwd" class="required">Current Password</label>
            <input type="password" id="current-pwd" required autocomplete="oldpass" autofocus  v-model="passUpdate.oldpass"/>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="single-input-item">
                    <label for="new_pwd" class="required">New Password</label>
                    <input type="password" id="new_pwd" name="password" required autocomplete="new-password" :v-on:change="macthNewPass" v-model="passUpdate.password"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-input-item" id="confirm_pass_section">
                    <label for="confirm_pwd" class="required">Confirm Password</label>
                    <input type="password" id="confirm_pwd"  name="password_confirmation" required autocomplete="new-password" :v-on:change="macthNewPass" v-model="passUpdate.password_confirmation"/>
                </div>
            </div>
        </div>
        <div class="single-input-item">
            <button type="button" class="check-btn sqr-btn" @click="changePassword()">Update Password</button>
        </div>
    </div>
</div>
