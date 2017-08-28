// 自己封装jq插件的命名方式：jquery.名字.js
// function名应与插件名一致
// 为jq添加插件的两种方式
//注册之后用$().func调用
$.fn.extend({
	myPlugIn: function () {
		// this就是通过jq获取的对象
		// 为了不混淆DOM的this和jq的this，一般把这里的this改名成$_this
		var $_this = this;

		var totalWidth = $_this.width();
		// 子元素宽度
		var itemWidth = $_this.children('.imgBox').width();
		// 每一行的个数
		var colNum = Math.floor(totalWidth/itemWidth);
		// 计算间距
		var margin = (totalWidth-colNum*itemWidth)/(colNum-1);
		// 准备一个数组记录每一列的高度
		var topArr = [];
		// 先给第一行一个margin
		for (var i = 0; i < colNum; i++) {
			topArr[i] = margin;
		}
		// jq中循环数组的方法
		$_this.children('.imgBox').each(function(index, element) {
			// element是DOM对象，所以要先转换成jq对象
			var $_item = $(element);

			// 找出数组中最小的值以及其index
			var minIndex = 0;
			var minTop = topArr[0];
			for (var i = 0; i < topArr.length; i++) {
				if (topArr[i] < minTop) {
					minTop = topArr[i];
					minIndex = i;
				}
			}

			// 改变item的top和left值使其添加到最短的列的最后一个元素下面
			$_item.css({
				'left': (margin+itemWidth)*minIndex,
				'top': minTop
				});

			// 因为添加了新元素将，更新列高数组的对应值
			topArr[minIndex] += $_item.height();
			console.log($_item.children('img').height());
			topArr[minIndex] += margin;
		})

		var maxTop = topArr[0];
		for (var i = 0; i < topArr.length; i++) {
			if (topArr[i]>maxTop) {
				maxTop = topArr[i];
			}
		}
		$_this.height(maxTop);


		// 为了能链式编程在最后要返回this
		return $_this;
	}
});
//注册之后用$.func调用
$.extend({
	myPlugIn: function () {

	}
});