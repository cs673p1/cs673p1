 


var ar_ext = ['pdf', 'gif', 'jpe', 'jpg'];        // array with allowed extensions

function checkName(el, to, sbm) {
// - coursesweb.net
  // get the file name and split it to separe the extension
  var name = el.value;
  var ar_name = name.split('.');

  // for IE - separe dir paths (\) from name
  var ar_nm = ar_name[0].split('\\');
  for(var i=0; i<ar_nm.length; i++) var nm = ar_nm[i];

  // add the name in 'to'
  document.getElementById(to).value = nm;

  // check the file extension
  var re = 0;
  for(var i=0; i<ar_ext.length; i++) {
    if(ar_ext[i] == ar_name[1]) {
      re = 1;
      break;
    }
  }

  // if re is 1, the extension is in the allowed list
  if(re==1) {
    // enable submit
    document.getElementById(sbm).disabled = false;
  }
  else {
    // delete the file name, disable Submit, Alert message
    el.value = '';
    document.getElementById(sbm).disabled = true;
    alert('".'+ ar_name[1]+ '" is not an file type allowed for upload');
  }
}
a
