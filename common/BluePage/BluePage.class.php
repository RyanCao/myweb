<?php
/*

* ----------------------------------------------------
* ID     : BluePage.class
* Author : Sam Teng <Sam@Bluessoft.com>
* ----------------------------------------------------
* Homepage: http://www.bluessoft.com/project/bluepage
* ----------------------------------------------------

*
*/

if ( ! class_exists ( "BluePage" ) )
{
    class BluePage
    {
    	var $_total ;         // 记录总数
    	var $_col ;           // 每页显示数
    	var $_var  ;          // 分页变量，默认是page    	
    	var $_pos     = 3 ;   // 当前页在分页条中的位置
    	var $_prefix  = '' ;  // 分页值的前填,比如 p123中的p
    	var $_postfix = '' ;  // 分页值的后填,比如 123p中的p
    	var $_symbol  = '&' ; // &或&amp;
    	var $_encode  = true ;// 是否对query string过滤
  	    
  	    var $_getlink = true ;  // 是否建造链接
  	    var $_getqs   = true ;  // 是否取Query String
  	    var $_qs      = '' ;         // Query String
  	    
  	    var $_order = 'f|pg|p|bar|ng|n|m' ;       // html的组合方式，参见配置文件
  	    var $_full  = 'f|pg|p|bar|n|ng|m|sl|i' ;  // Full
  	    var $_file  = 'Page.default.inc.php' ;    // 默认分页html配置文件，需要与Pager.class.php同路径
  	    
    	/*
    	参数说明:
		$intTotal     记录总数
		$intCol       每页显示数
		$strPageVar   页码变量
    	*/
    	function BluePage ( $intTotal , $intCol , $strPageVar = 'page' ) 
    	{
    		$this->_total = intval ( $intTotal ) ;
    		$this->_col   = intval ( $intCol ) ;
    		$this->_var   = $strPageVar ;
    		return true ;
    	}
    	
		/*
		参数说明:
		$intNum     显示多少个页码
		
		返回:
		$aPDatas[offset]   offset
		$aPDatas[m]        总页(最大页)数
		$aPDatas[m_ln]     总页(最大页)数 链接  需要$this->_getlink = true  以下相同
		$aPDatas[t]        当前页码
		$aPDatas[p]        上一页页码
		$aPDatas[p_ln]     上一页 链接
		$aPDatas[n]        下一页
		$aPDatas[n_ln]     下一页 链接
		$aPDatas[ng]       下一组页码
		$aPDatas[ng_ln]    下一组链接
		$aPDatas[qs]       Query String ?号后面部份，需要$this->_getqs = true ;
		
		当$this->_getlink = false 时:
		$aPDatas[bar]      分页条，一维数组
		当$this->_getlink = true 时:
		$aPDatas[bar]      多维数组，$aPDatas[bar][num] 分页数字   $aPDatas[bar][ln] 分页链接
		*/
    	function get( $intNum = 10 )
    	{
			$aPDatas = array( ) ;
			if ( $this->_total < 1 || $this->_col < 1 )
		    {
		        $aPDatas[offset]   = 0 ;
		        $aPDatas[m]  = $aPDatas[p] = $aPDatas[n] = 1 ;
		        return $aPDatas ;
		    }
		    
			( $intThisPage = $this->getPage( $_REQUEST[$this->_var] ) ) > 1  
			? $aPDatas[t] = $intThisPage 
			: $aPDatas[t] = $intThisPage = 1 ;

		    if ( $this->_total < 1 || $this->_col < 1 )
		    {
		        $aPDatas[offset] = 0 ;
		        $aPDatas[t] = $aPDatas[m] = $aPDatas[p] = $aPDatas[n] = 1 ;
		    }
		    else
		    {
			    $aPDatas[offset]   = $this->_col * ( $intThisPage - 1 ) ; 
			    $aPDatas[m]  = ceil ( $this->_total / $this->_col ) ;
			    $aPDatas[p]  = $intThisPage < 2 ? 1 : $intThisPage - 1 ;
			    $aPDatas[n] = $intThisPage == $aPDatas[m] 
			                       ? $aPDatas[m]  : $intThisPage + 1 ;
		    }
		    
		    if ( $this->_getlink )
		    {
		    	$this->getQueryString () ;
		    	$aPDatas[m_ln]  = $this->setLink( $aPDatas[m] ) ;
		        $aPDatas[p_ln]  = $this->setLink( $aPDatas[p] ) ;
		        $aPDatas[n_ln] = $this->setLink( $aPDatas[n] ) ;
		    }
		    
		    $intNum = intval ( $intNum );
		    if ( $intNum ) 
		    {
			    $intSPage = ( $intSsPage = $intThisPage + 1 - $this->_pos ) < 1 ? 1 : $intSsPage ;
			    $intEPage = ( $intEsPage = $intSPage + $intNum - 1 ) > $aPDatas[m] 
			              ? $aPDatas[m] : $intEsPage ; 
			    $aPDatas[pg]  = ( $intPGroup = $intThisPage - $intNum ) > 1 ?  $intPGroup  : 1 ;
			    $aPDatas[ng] = ( $intNGroup = $intThisPage + $intNum ) < $aPDatas[m] ? $intNGroup : $aPDatas[m] ;
			    
			    $arrPageBar = array ( ) ; 
			    if ( $this->_getlink ) 
			    {
			    	$aPDatas[pg_ln] = $this->setLink( $aPDatas[pg] ) ; 
			    	$aPDatas[ng_ln] = $this->setLink( $aPDatas[ng] ) ;
			    	$k = 0 ;
			    	for ( $i = $intSPage ; $i <= $intEPage ; $i++ ) 
				    {
				        $arrPageBar[$k]['num']  = $i ;
				        $arrPageBar[$k]['ln'] = $this->setLink( $i ) ;
				        $k++ ;
				    }
			    }
			    else
			    {
				    for ( $i = $intSPage ; $i <= $intEPage ; $i++ ) 
				    {
				        $arrPageBar[] = $i ;
				    }
				}
			    $aPDatas[bar]  = $arrPageBar ;
			    
			}
			if ( $this->_getqs )
			{
				if ( !$strQueryString )
				{
		    	    $this->getQueryString() ;
		    	    $aPDatas[qs] = $this->_qs ;
		    	}
		    	else
		    	{
		    		$aPDatas[qs] = $strQueryString ;
		    	}
			}
			
		    return $aPDatas ;
    	}
    	
    	function getFull( $aPDatas , $strHtmlFile = '' )
    	{
    		$this->_order = $this->_full ;
    		return $this->getHTML( $aPDatas , $strHtmlFile ) ;
    	}
    	
    	function getHTML( $aPDatas , $strHtmlFile = '' )
    	{
    	    if ( $strHtmlFile == '' )
    	    {
    	    	$strHtmlFile = str_replace("\\" , "/", dirname( __FILE__ ) ) . '/'. $this->_file  ;
    	    };
    		if ( file_exists ( $strHtmlFile ) )
    		{
    			include ( $strHtmlFile ) ; 
    			$aPA = explode( "|" , $this->_order ) ; 
    			if ( is_array( $aPA )  ) 
    			{
    				$strHtmlBody = '' ;
    				foreach ( $aPA as $intPAkey )
    				{
    					switch ( $intPAkey )
    					{
    						case 'm' :
    						    $strHtmlBody .= sprintf( $PA[m] , $aPDatas[m_ln] , $aPDatas[m] ) ;
    							break ;
    						case 'f' :
    						    $strHtmlBody .= sprintf( $PA[f] , $this->setLink(1) ) ;
    							break ;
    						case 'pg' :
    						    if ( $aPDatas[t] > $this->_pos  ) 
    						    $strHtmlBody .= sprintf( $PA[pg] , $aPDatas[pg_ln] ) ;
    							break ;
    						case 'p' :
    						    $strHtmlBody .= sprintf( $PA[p] , $aPDatas[p_ln] ) ;
    							break ;
    						case 'bar' :
    						    $strBar = '' ;
    						    foreach ( $aPDatas[bar] AS $aPBar ) 
    						    {
    						    	$strBar .= sprintf( $PA[bar] , $aPBar[ln] , $aPBar[num] ) ;
    						    }
    						    $strHtmlBody .= $PA[bar_head].$strBar.$PA[bar_end] ;
    						    $strHtmlBody .= sprintf( $PA[bar_s1] , $aPDatas[t] , $aPDatas[t] );
    							break ;
    						case 'ng' :
    						    $strHtmlBody .= sprintf( $PA[ng] , $aPDatas[ng_ln] ) ;
    							break ;
    						case 'n' :
    						    $strHtmlBody .= sprintf( $PA[n] , $aPDatas[n_ln] ) ;
    							break ;
    						case 'sl':
    						    $strHtmlBody .= $this->getSlection ( $aPDatas[m] , $PA[sl_head] , $PA[sl] , $PA[sl_end] ) ;
    						    break ;
    						case 'i':
    						
    						    $strHtmlBody .= sprintf( $PA[i] , $aPDatas[qs] , $this->_var, $this->_prefix , $this->_postfix ) ;
    						    break ;
    					}
    				}
    				return $strHtmlBody ;
    			}
    		}
    		
            return '' ;
    	}
    	
    	function getPage( $mixPage ) 
    	{
    		if ( $this->_prefix )  $mixPage = str_replace( $this->_prefix  , '' , $mixPage ) ;
    		if ( $this->_postfix ) $mixPage = str_replace( $this->_postfix , '' , $mixPage ) ;
    		return intval( $mixPage ) ;
    	}
    	
    	function setLink( $intPage )
    	{
    		$strLink = $this->_qs ? '?' . $this->_qs . $this->_var . '=' . $this->_prefix . $intPage . $this->_postfix 
    		                           : '?' . $this->_var . '=' . $this->_prefix . $intPage . $this->_postfix ; 
    		return $strLink ;
    	}
    	
    	function getSlection ( $intMaxPage , $strSLHead , $strSL , $strSLEnd )
    	{
    		$intThisPage = $this->getPage( $_REQUEST[$this->_var] ) ;
			$intMax = intval ( $intMaxPage ) ; 
			if ($intMax < 1 )return;
			for ( $i = 1 ; $i<= $intMax ; $i++ )
			{
		        $strSLBODY .= sprintf( $strSL , $this->_qs , $this->_var , $this->_prefix ,  $this->_postfix , $i  ) ;
			}
			$strPattern = '/(\>' . $intThisPage . '<\/option>)/' ;
			preg_match_all( $strPattern, $strSLBODY , $arrResult );
			$strSLBODY = str_replace($arrResult[1][0]," selected ".$arrResult[1][0],$strSLBODY) ;
			return $strSLHead . $strSLBODY . $strSLEnd  ;

    	}
    	
    	function getQueryString( )
    	{
    		$strPagepattern = '/('.$this->_var.'=('.$this->_prefix.')\d{0,}('.$this->_postfix.'))/' ;
		    preg_match_all( $strPagepattern, $_SERVER["QUERY_STRING"] , $arrResult );
		    $strQueryString = $arrResult[1][0] ? str_replace( "&".$arrResult[1][0] , "" , $_SERVER["QUERY_STRING"] ) : $_SERVER["QUERY_STRING"];
		    $strQueryString = str_replace( $arrResult[1][0] , "" , $strQueryString ) ; 
		    if ( $strQueryString ) 
		    {
		    	$strQueryString = $this->_encode ? htmlspecialchars($strQueryString).$this->_symbol : $strQueryString.$this->_symbol;
		    } 
		    $this->_qs =  $strQueryString  ;
		    return true ;
    	}
    }
}
?>