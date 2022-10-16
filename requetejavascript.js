<script language="javascript">
             function pre()
{ 

				 alert(".ÛíÑ ãÚÑæİ ÊÚäí ÅÕÏÇÑ ÈÍßã Ãí ãä áÇíÚÑİ ÊÇÑíÎ ãíáÇÏå ÇáÕÍíÍ\r\r\   ÇáĞí áíÓ áÏíå ÊÇÑíÎ ãíáÇÏ ÕÍíÍ íÌÈ ÇáäŞÑ Úáì ÇáãÑÈÚ ÇáÕÛíÑ\r\n ");
                // document.Button2.submit();
              
	}		  
              </script>
           
   
<script language="JavaScript">
function Controle()
{

if(document.form1.annexe.value=='') // 3
{
alert('ÃßÊÈ ÑŞã ÊÓÌíáß ÕÍíÍÇ !');
document.form1.annexe.focus();

return;
}
if(isNaN(document.form1.annexe.value)) // 2
{
alert('ÃßÊÈ ÑŞã ÊÓÌíáß ÕÍíÍÇ !');
document.form1.annexe.value='';
document.form1.annexe.focus();

return;
}
if(document.form1.nseq.value=='') // 1
{
alert('ÅãáÇú ÇáİÑÇÛ ÃæáÇ !');
document.form1.nseq.focus();
return;
}

if(isNaN(document.form1.nseq.value)) // 2
{
alert('ÃßÊÈ ÑŞã ÊÓÌíáß ÕÍíÍÇ !');
document.form1.nseq.value='';
document.form1.nseq.focus();

return;
}
if(document.form1.nseq.value.length<5) // 3
{
alert('ÃßÊÈ ÑŞã ÊÓÌíáß ÕÍíÍÇ !');
document.form1.nseq.value==''
document.form1.nseq.focus();

return;
}
if(document.form1.anneeins.selectedIndex=='')
{
	alert("ÃßÊÈ ÑŞã ÊÓÌíáß ÕÍíÍÇ");
	document.form1.anneeins.focus();
	return;
}
var vv=document.getElementById('presume').checked;
if(!vv)   //if(vv=false)
  {

if(document.form1.jj.selectedIndex=='')
{
	alert("ãä İÖáß ÃÏÎá ÊÇÑÎ ãíáÇÏß");
	document.form1.jj.focus();
	return;
}

if(document.form1.mm.selectedIndex=='')
{
	alert("ãä İÖáß ÇÏÎá ÊÇÑíÎ ãíáÇÏß");
	document.form1.mm.focus();
	return;
}
}
if(document.form1.aa.selectedIndex=='')
{
	alert(" ãä İÖáß ÃÏÎá ÊÇÑíÎ ãíáÇÏß");
	document.form1.aa.focus();
	return;
}

document.form1.submit();

}

function presumer()
{
var vv=document.getElementById('presume').checked;
if(vv)
  {
document.getElementById('jj').disabled=true  ;
document.getElementById('jj').selectedIndex='';

document.getElementById('mm').disabled=true  ;
document.getElementById('mm').selectedIndex='';
}
else if(vv==false)
  {
document.getElementById('jj').disabled=false;  
document.getElementById('mm').disabled=false;
}         
}

function nseqq()
{
document.form_nseq.submit();
}


</script>