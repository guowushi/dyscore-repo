 /*检查是否为空值,为空返回真，否则为false*/
   function checkNull(val)
   {
        
		 
		 if(val=="")
			return true;
		 else
			return false;
		 
   }

 
 /*检查文本是否是中文，如果是返回true,否则返回fasle*/
   function isChinese(val)
   {
        
		var ret=true;
		for(var i=0;i<val.length;i++)
			ret=ret && (val.charCodeAt(i)>=10000);
		return ret; 
		 
   }