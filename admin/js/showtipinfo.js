/**
 * 显示弹窗提示相关的提示信息
 */

var Position = {
	getElementLeft : function(o)
	{
		(typeof o == "string") ? o = document.getElementById(o) : "";
		var L = 0;
		while (o)
		{
			L += o.offsetLeft || 0;
			o = o.offsetParent;
		}
		return L;
	},
	getElementTop : function(o)
	{
		(typeof o == "string") ? o = document.getElementById(o) : "";
		var T = 0;
		while (o)
		{
			T += o.offsetTop || 0;
			o = o.offsetParent;
		}
		return T;
	}
};

function showTipsInfo(divTip,divTipAbrand1)
{
	document.getElementById(divTip).style.display = "block";
    document.getElementById(divTip).style.left = Position.getElementLeft(divTipAbrand1) + 2+"px";
    document.getElementById(divTip).style.top = Position.getElementTop(divTipAbrand1)  + 45 + "px";
}

function hideTipsInfo(divTip)
{
	document.getElementById(divTip).style.display = "none";
}