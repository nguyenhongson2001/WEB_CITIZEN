
        function getValue(id) {
          return document.getElementById(id).value.trim();
        }

        function showError(key, mess) {
          document.getElementById(key+'_error').innerHTML = mess;
        }
        // function is_alpha(string) {
        //   var format = /[aàáảãạăằắẳẵặâầấẩẫậeèéẻẽẹêềếểễệiìíỉĩịoòóỏõọôồốổỗộơờớởỡợuùúủũụưừứửữựbcdđghklmnpqrstvxy]+/;
        //   if( string.match(format) ){
        //     return true;
        //   } else {
        //     return false;
        //   }
        // }

        function is_special(string) {
          var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
          if( string.match(format) ){
            return true;
          } else {
            return false;
          }
        }

        function validate() {
          var flag = true;

          var name = getValue('person-name');
          
          if (name == '') {
            flag = false;
            showError('name', 'Bạn chưa nhập họ tên');
          } else if(/[0-9]/.test(name) || is_special(name)){
            flag = false;
            showError('name', 'Vui lòng kiểm tra lại họ tên');
          } else {
            flag = true;
            showError('name', '');
          }

          var birthday = getValue('person-dob');
          if (birthday == '') {
            flag = false;
            showError('birthday', 'Bạn chưa nhập ngày tháng năm sinh của bạn');
          } else {
            flag = true;
            showError('birthday', '');
          }

          var cccd = getValue('person-id');
          if (cccd == '') {
            flag = false;
            showError('cccd', 'Bạn chưa nhập căn cước công dân/chứng minh thư');
          } else if(cccd.length < 9 || cccd.length > 12){
            flag = false;
            showError('cccd', 'Vui lòng kiểm tra lại căn cước công dân/chứng minh thư');
          } else if (/^\d+$/.test(cccd)){
            flag = true;
            showError('cccd', '');
          }

          var permanent_city = getValue('person-city-selector');
          if (permanent_city == '') {
            flag = false;
            showError('permanent-city', 'Bạn chưa nhập thành phố');
          } else if(is_special(permanent_city)){
            flag = false;
            showError('permanent-city', 'Vui lòng kiểm tra lại thành phố');
          } else {
            flag = true;
            showError('permanent-city', '');
          }
          
          var permanent_district = getValue('person-district-selector');
          if (permanent_district == '') {
            flag = false;
            showError('permanent-district', 'Bạn chưa nhập quận/huyện');
          } else if(is_special(permanent_district)){
            flag = false;
            showError('permanent-district', 'Vui lòng kiểm tra lại quận/huyện');
          } else {
            flag = true;
            showError('permanent-district', '');
          }

          var permanent_commune = getValue('person-commune-selector');
          if (permanent_commune == '') {
            flag = false;
            showError('permanent-commune', 'Bạn chưa nhập xã/phường');
          } else if(is_special(permanent_commune)){
            flag = false;
            showError('permanent-commune', 'Vui lòng kiểm tra lại xã/phường');
          } else {
            flag = true;
            showError('permanent-commune', '');
          }

          var permanent_village = getValue('person-village-selector');
          if (permanent_village == '') {
            flag = false;
            showError('permanent-village', 'Bạn chưa nhập thôn/xóm');
          } else if(is_special(permanent_village)){
            flag = false;
            showError('permanent-village', 'Vui lòng kiểm tra lại thôn/xóm');
          } else {
            flag = true;
            showError('permanent-village', '');
          }

          var job = getValue('person-job');
          if (job == '') {
            flag = false;
            showError('job', 'Bạn chưa nhập nghề nghiệp');
          } else if(/[0-9]/.test(job) || is_special(job)){
            flag = false;
            showError('job', 'Vui lòng kiểm tra lại nghề nghiệp');
          } else {
            flag = true;
            showError('job', '');
          }

          var religion = getValue('person-tongiao');
          if (religion == '') {
            flag = false;
            showError('religion', 'Bạn chưa nhập tôn giáo');
          } else if(/[0-9]/.test(religion) || is_special(religion)){
            flag = false;
            showError('religion', 'Vui lòng kiểm tra lại tôn giáo');
          } else {
            flag = true;
            showError('religion', '');
          }

          var education_level = getValue('person-culturelevel');
          if (education_level == '') {
            flag = false;
            showError('education-level', 'Bạn chưa nhập trình độ văn hóa');
          } else if(is_special(education_level)){
            flag = false;
            showError('education-level', 'Vui lòng kiểm tra lại trình độ văn hóa');
          } else {
            flag = true;
            showError('education-level', '');
          }
          var temporary_city = getValue('import-city-selector');
          if (temporary_city == '') {
            flag = false;
            showError('temporary-city', 'Bạn chưa nhập thành phố');
          } else if(is_special(temporary_city)){
            flag = false;
            showError('temporary-city', 'Vui lòng kiểm tra lại thành phố');
          } else {
            flag = true;
            showError('temporary-city', '');
          }
          
          var temporary_district = getValue('import-district-selector');
          if (temporary_district == '') {
            flag = false;
            showError('temporary-district', 'Bạn chưa nhập quận/huyện');
          } else if(is_special(temporary_district)){
            flag = false;
            showError('temporary-district', 'Vui lòng kiểm tra lại quận/huyện');
          } else {
            flag = true;
            showError('temporary-district', '');
          }

          var temporary_commune = getValue('import-commune-selector');
          if (temporary_commune == '') {
            flag = false;
            showError('temporary-commune', 'Bạn chưa nhập xã/phường');
          } else if(is_special(temporary_commune)){
            flag = false;
            showError('temporary-commune', 'Vui lòng kiểm tra lại xã/phường');
          } else {
            flag = true;
            showError('temporary-commune', '');
          }
          return flag;
        }