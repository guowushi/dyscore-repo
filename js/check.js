<script type="text/javascript">


  /*--------------------------------------*/
function onblurFunc(obj,aaa)
			{
				
				tishichuxian(obj);
				checkNull(obj,aaa);
			}
			function onfocusFunc(obj)
			{
				huanyuan(obj);
				tishixiaoshi(obj);
			}
		/*-----------*/
		/*---��ʽ��ԭ-*/
		function huanyuan(obj)
		{
			if(obj.style.backgroundColor == 'red')
				obj.style.backgroundColor =  'white' ;
		}
		/*-----------�ύ���---------*/
			function chk()
			{
				var allInput = document.getElementsByTagName('input');
				var len =  allInput.length;
				var wei = 1;
				for(var i = 0;i < len; i++)
				{
					if(allInput[i].value == "")
					{
						//alert("����ѡ��δ��");
						wei = 0;
						break;
					}
				}
				for(var i = 0;i < len; i++)
				{
					if(allInput[i].value == "")
					{
							allInput[i].style.backgroundColor = 'red';

					}
				}
				if(wei == 0)
				{
					return false;
				}
				else
				{
					goSubmit(wei);
					return true;
				}
				
			}
			function goSubmit(wei){
				if(wei){
					document.getElementById('FormName').submit();
				}
			}
			/*--------------------------*/
			/*----------�������ݵļ��------*/
			function checkNull(obj,ccc)
			{

				if(obj.value == "")
					{/*alert("��ѡ���Ϊ��");*/
						ErrInfo(obj);
					}
				else if(ccc())
					{
						obj.value = "";
						ErrInfo(obj);
					}
			}
			/*-----------------------*/
  function tishixiaoshi(obj)
  {
	  var pre = obj.previousSibling		
	  if(obj.value =="")
			pre.style.display = "none";
  }
  function tishichuxian(obj)
  {
	  var pre = obj.previousSibling
	if(obj.value =="")
		pre.style.display = "block";
  }

  function ErrInfo(obj)
  {

	var info = "������δ���\\δ��";
	obj.previousSibling.innerHTML = info;
	}