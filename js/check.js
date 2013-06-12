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
		/*---样式还原-*/
		function huanyuan(obj)
		{
			if(obj.style.backgroundColor == 'red')
				obj.style.backgroundColor =  'white' ;
		}
		/*-----------提交检查---------*/
			function chk()
			{
				var allInput = document.getElementsByTagName('input');
				var len =  allInput.length;
				var wei = 1;
				for(var i = 0;i < len; i++)
				{
					if(allInput[i].value == "")
					{
						//alert("你有选项未填");
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
			/*----------所有内容的检测------*/
			function checkNull(obj,ccc)
			{

				if(obj.value == "")
					{/*alert("该选项不能为空");*/
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

	var info = "该项您未填对\\未填";
	obj.previousSibling.innerHTML = info;
	}