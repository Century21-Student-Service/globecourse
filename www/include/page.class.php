<?php	if(!defined('IN_PHPMYWIND')) exit('Request Error!');

/*
 * 分页类
 *
**************************
(C)2010-2013 phpMyWind.com
update: 2011-4-26 15:00:19
person: Feng
**************************
*/


$dopage = new Page();

class Page
{
	var $page;      //当前页码
	var $totalpage; //总共页数
	var $pagenum;   //每页记录数
	var $total;     //总共记录数

    function __construct()
    {
		$this->Init();
    }

    function Page()
    {
		$this->__construct();
    }
	
	function Init()
    {
		$this->page      = '';
		$this->totalpage = '';
		$this->pagenum   = '';
		$this->total     = '';
    }

	//获取分页变量
	function GetPage($sql,$pagenum=20)
	{
		global $dosql;

		$dosql->Execute($sql);
		$this->page      = @$GLOBALS['page'];
		$this->total     = $dosql->GetTotalRow();
		$this->pagenum   = $pagenum;
		$this->totalpage = ceil($this->total / $this->pagenum);
		
		if(!isset($this->page) || !intval($this->page) || $this->page<=0 || $this->page > $this->totalpage)
		{
			$this->page = 1;
		}

		$startnum = ($this->page-1) * $this->pagenum;

		$sql .= " limit $startnum, $this->pagenum";

		return $dosql->Execute($sql);
	}

	//显示分页列表
	function GetResult_num()
	{
		$pagetxt = $this->total;

		return $pagetxt;
	}

	//显示分页列表
	function GetList()
	{
		global $cfg_isreurl,$keyword;

		$pagetxt = '';
		$page_design__class = 'gdlr-core-pagination  gdlr-core-style-round gdlr-core-left-align gdlr-core-item-pdlr';  // 'PageBox'
		$page_num__class = ' aria-current="page" class="page-numbers"';  // not 'On'
		$page_highlight__class = ' aria-current="page" class="page-numbers current"';  // 'On'

		if($this->total <= $this->pagenum)
		{
			// $pagetxt = '<div class="PageBox"><span>共'.$this->totalpage.'页 , '.$this->total.'条记录</span></div>';
			$pagetxt = '<div class="'.$page_design__class.'"><span'.$page_highlight__class.'>共'.$this->totalpage.'页 , '.$this->total.'条记录</span></div>';
		}

		else
		{
			//获取除page参数外的其他参数
			$query_str = explode('&',$_SERVER['QUERY_STRING']);

			if($query_str[0] != '')
			{
				$query_strs = '';

				foreach($query_str as $k)
				{
					$query_str_arr = explode('=', $k);

					if(strstr($query_str_arr[0],'page') == '')
					{
						$query_str_arr[0] = isset($query_str_arr[0]) ? $query_str_arr[0] : '';
						$query_str_arr[1] = isset($query_str_arr[1]) ? $query_str_arr[1] : '';

						//伪静态设置
						if($cfg_isreurl == 'Y' &&
						   !isset($keyword))
						{
							$query_strs .= '-'.$query_str_arr[1];
						}
						else
						{
							$query_strs .= $query_str_arr[0].'='.$query_str_arr[1].'&';
						}
					}
				}
		
				$nowurl = '?'.$query_strs;
			}
			else
			{
				$nowurl = '?';
			}
			
			//伪静态设置
			if($cfg_isreurl == 'Y' &&
			   !isset($keyword))
			{
				$request_arr = explode('.',$_SERVER['SCRIPT_NAME']);
				$request_rui = explode('/',$request_arr[count($request_arr)-2]);

				//获取除页码以外的参数
				$nowurl      = ltrim($request_rui[count($request_rui)-1],'/').ltrim($nowurl,'?');
			}
			$previous = $this->page - 1;
			if($this->totalpage == $this->page) $next = $this->page;
			else $next = $this->page + 1;

			// $pagetxt = '<div class="PageBox">';
			$pagetxt = '<div class="'.$page_design__class.'">';

			//上一页 第一页
			if($this->page > 1)
			{
				//伪静态设置
				if($cfg_isreurl == 'Y' &&
				   !isset($keyword))
				{
					// $pagetxt .= '<span><a href="'.$nowurl.'-1.html" title="第一页">首 页</a></span>';
					// $pagetxt .= '<span><a href="'.$nowurl.'-'.$previous.'.html" title="上一页">上一页</a></span>';
					$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'-1.html" title="第一页">首 页</a>';
					$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'-'.$previous.'.html" title="上一页">上一页</a>';
				}
				else
				{
					// $pagetxt .= '<span ><a href="'.$nowurl.'page=1" title="第一页">首 页</a></span>';
					// $pagetxt .= '<span ><a href="'.$nowurl.'page='.$previous.'" title="上一页">上一页</a></span>';
					$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'page=1" title="第一页">首 页</a>';
					$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'page='.$previous.'" title="上一页">上一页</a>';
				}
			}
			else
			{
				// $pagetxt .= '<span>首 页</span>';
				// $pagetxt .= '<span>上一页</span>';
				$pagetxt .= '<a '.$page_num__class.' title="首页">首 页</a>';
				$pagetxt .= '<a '.$page_num__class.' title="上一页">上一页</a>';
			}

			//当总页数小于10
			if($this->totalpage < 10)
			{
				for($i=1; $i <= $this->totalpage; $i++)
				{
					if($this->page == $i)
					{
						// $pagetxt .= '<span class="On"><a href="javascript:;" class="on" >'.$i.'</a></span>';
						$pagetxt .= '<span '.$page_highlight__class.' href="javascript:;"'.$page_highlight__class.' >'.$i.'</span>';
					}
					else
					{
						//伪静态设置
						if($cfg_isreurl == 'Y' &&
						   !isset($keyword))
						{
							// $pagetxt .= '<span><a href="'.$nowurl.'-'.$i.'.html" title="第 '.$i.' 页">'.$i.'</a></span>';
							$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'-'.$i.'.html" title="第 '.$i.' 页">'.$i.'</a>';
						}
						else
						{
							// $pagetxt .= '<span><a href="'.$nowurl.'page='.$i.'" title="第 '.$i.' 页">'.$i.'</a></span>';
							$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'page='.$i.'" title="第 '.$i.' 页">'.$i.'</a>';
						}
					}
				}
			}
			else
			{
				if($this->page==1 or $this->page==2 or $this->page==3)
				{
					$m = 1;
					$b = 7;
				}

				//如果页面大于前三页并且小于后三页则显示当前页前后各三页链接
				if($this->page>3 and $this->page<$this->totalpage-2)
				{
					$m = $this->page-3;
					$b = $this->page+3;
				}

				//如果页面为最后三页则显示最后7页链接
				if($this->page==$this->totalpage or $this->page==$this->totalpage-1 or $this->page==$this->totalpage-2)
				{
					$m = $this->totalpage - 7;
					$b = $this->totalpage;
				}
				if($this->page > 4)
				{
					// $pagetxt .= '<a '.$page_num__class.' href="javascript:;">...</a>';
					$pg_before = $this->page -4;
					$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'page='.$pg_before.'" title="页面间隔">...</a>';
				}

				//显示数字页码
				for($i=$m; $i<=$b; $i++)
				{
					if($this->page == $i)
					{
						// $pagetxt .= '<span><a href="'.$nowurl.'page='.$i.'" class="on">'.$i.'</a></span>';
						$pagetxt .= '<span href="'.$nowurl.'page='.$i.'" '.$page_highlight__class.'>'.$i.'</span>';
					}
					else
					{
						//伪静态设置
						if($cfg_isreurl == 'Y' &&
						   !isset($keyword))
						{
							// $pagetxt .= '<span><a href="'.$nowurl.'-'.$i.'.html" class="num" title="第 '.$i.' 页">'.$i.'</a></span>';
							$pagetxt .= '<a href="'.$nowurl.'-'.$i.'.html" '.$page_num__class.' title="第 '.$i.' 页">'.$i.'</a>';
						}
						else
						{
							// $pagetxt .= '<span><a href="'.$nowurl.'page='.$i.'" class="num" title="第 '.$i.' 页">'.$i.'</a></span>';
							$pagetxt .= '<a href="'.$nowurl.'page='.$i.'" '.$page_num__class.' title="第 '.$i.' 页">'.$i.'</a>';
						}
					}
				}
				if($this->page < $this->totalpage-3)
				{
					// $pagetxt .= '<span><a href="javascript:;">...</a></span>';
					$pg_after = $this->page +4;
					$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'page='.$pg_after.'" title="页面间隔">...</a>';
				}
			}

			//下一页 最后页
			if($this->page < $this->totalpage)
			{
				//伪静态设置
				if($cfg_isreurl == 'Y' &&
				   !isset($keyword))
				{
					// $pagetxt .= '<span><a href="'.$nowurl.'-'.$next.'.html" title="下一页">下一页</a></span>';
					// $pagetxt .= '<a href="'.$nowurl.'-'.$this->totalpage.'.html" title="尾页"> 尾 页 </a></span>';
					$pagetxt .= '<span><a href="'.$nowurl.'-'.$next.'.html" title="下一页">下一页</a></span>';
					$pagetxt .= '<a href="'.$nowurl.'-'.$this->totalpage.'.html" title="尾页"> 尾 页 </a></span>';
				}
				else
				{
					// $pagetxt .= '<span><a href="'.$nowurl.'page='.$next.'" title="下一页">下一页</a></span>';
					// $pagetxt .= '<span><a href="'.$nowurl.'page='.$this->totalpage.'" title="尾页"> 尾 页 </a></span>';
					$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'page='.$next.'" title="下一页">下一页</a>';
					$pagetxt .= '<a '.$page_num__class.' href="'.$nowurl.'page='.$this->totalpage.'" title="尾页"> 尾 页 </a>';
				}
			}
			else
			{
				// $pagetxt .= '<span><a href="javascript:;" title="已是最后一页">下一页</a></span>';
				// $pagetxt .= '<span><a href="javascript:;" title="已是最后一页"> 尾 页 </a></span>';
				$pagetxt .= '<a '.$page_num__class.' href="javascript:;" title="已是最后一页">下一页</a>';
				$pagetxt .= '<a '.$page_num__class.' href="javascript:;" title="已是最后一页"> 尾 页 </a>';
			}
			$pagetxt .= '</div>';
		}
		
		return $pagetxt;
	}
}
?>