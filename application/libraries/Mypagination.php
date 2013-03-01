<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination {

	var $query_string_segment = 't';
	var $num_tag_open = '';
	var $cur_tag_open		= '<strong>';
	var $cur_tag_close		= '</strong>';
	var $first_link			= '&lsaquo; Primeira';
	var $next_link			= '&gt;';
	var $prev_link			= '&lt;';
	var $last_link			= 'Última &rsaquo;';

	public function __construct(){
		parent::__construct();
	}


	function paginate()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}

		// Determine the current page number.
		$CI =& get_instance();

		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			if ($CI->input->get($this->query_string_segment) != 0)
			{
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;

			}
		}
		else
		{

			if ($CI->uri->segment($this->uri_segment) != 0)
			{
				$this->cur_page = $CI->uri->segment($this->uri_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;

			}
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = 0;

		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page > $this->total_rows)
		{
			$this->cur_page = ($num_pages - 1) * $this->per_page;
		}

		$uri_page_number = $this->cur_page;
		
		if (!isset($this->cur_page) || empty($this->cur_page)) $this->cur_page = 1;
		
		/*
		Uncommenting this line to use old method to create cur_page
		$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);
		*/
		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		
		// And here we go...
		$output = '';

		// Render the "First" link
		if  ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1))
		{
			$first_url = ($this->first_url == '') ? $this->base_url : $this->first_url;
			$output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="'.$first_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
		}

		// Render the "previous" link
		if  ($this->prev_link !== FALSE AND $this->cur_page != 1)
		{
			$i = $uri_page_number - $this->per_page;

			if ($i == 0 && $this->first_url != '')
			{
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}
			else
			{
				$i = ($i == 0) ? '' : $this->prefix.$i.$this->suffix;
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.($this->cur_page - 1).'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}

		}

		// Render the pages
		if ($this->display_pages !== FALSE)
		{
			// Write the digit links
			for ($loop = $start -1; $loop <= $end; $loop++)
			{
				$i = ($loop * $this->per_page) - $this->per_page;

				if ($i >= 0)
				{
					if ($this->cur_page == $loop)
					{

						$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
					}
					else
					{
						$n = ($i == 0) ? '' : $i;

						if ($n == '' && $this->first_url != '')
						{
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'">'.$loop.'</a>'.$this->num_tag_close;
						}
						else
						{
							$n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.'/'.$loop;

							// Is pagination being used over GET or POST?  If get, add a per_page query
							// string. If post, add a trailing slash to the base URL if needed
							if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
							{
								$output .= '?'.$this->query_string_segment.'='.$CI->input->get($this->query_string_segment);
							}


							$output .= '">'.$loop.'</a></li>'.$this->num_tag_close;

						}
					}
				}
			}
		}

		// Render the "next" link
		if ($this->next_link !== FALSE AND $this->cur_page < $num_pages)
		{
			$output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.($this->cur_page + 1).'">'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages)
		{
			$i = $num_pages;
			$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->last_link.'</a>'.$this->last_tag_close;
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		return $output;
	}

	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}

		// Determine the current page number.
		$CI =& get_instance();

		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			if (strlen($CI->input->get($this->query_string_segment)) > 0)
			{

				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else

		{
			if ($CI->uri->segment($this->uri_segment) != 0 && !isset($this->cur_page))
			{
				$this->cur_page = $CI->uri->segment($this->uri_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = 0;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page > $this->total_rows)
		{
			$this->cur_page = ($num_pages - 1) * $this->per_page;
		}

		$uri_page_number = $this->cur_page;
		//$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// And here we go...
		$output = '<div class="pagination">'
					.'<div class="pagination-wrapper glassbg-wrapper" id="pagination_wrapper">'
						.'<div class="bluebg-wrapper">'
							.'<div class="modal-content-wrapper">'
								.'<div class="pagination-hidder" id="scroll_pane">'
									.'<ul class="pagination selectable" id="scroll_content">';

		// Render the pages
		if ($this->display_pages !== FALSE)
		{
			// Write the digit links
			for ($loop = $start -1; $loop <= $end; $loop++)
			{
				$i = ($loop * $this->per_page) - $this->per_page;
				
				if ($i >= 0)
				{
					if ($this->cur_page == $loop)
					{
						$output .= "\n" . '<li class="selected"><a href="javascript:void(0);" class="btn-black">'.$this->cur_tag_open.$loop.$this->cur_tag_close.'</a></li>'; // Current page
					}
					else
					{
						$n = ($i == 0) ? '' : $i;

						
						$n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;
						$output .= $this->num_tag_open.'<li><a class="btn-black" '.$this->anchor_class.'href="'.$this->base_url.'/'.$loop;

						// Is pagination being used over GET or POST?  If get, add a per_page query
						// string. If post, add a trailing slash to the base URL if needed
						if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
						{
							$output .= '?'.$this->query_string_segment.'='.$CI->input->get($this->query_string_segment);
						}


						$output .= '">'.$loop.'</a></li>'.$this->num_tag_close;
					
					}


				}
			}
		}

		$output .= 					'</ul>'
								.'</div>'
								.'<div id="pagination_slider"></div>'
							.'</div>'
						.'</div>'
					.'</div>'
				.'</div>';

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		return $output;
	}	

}


?>