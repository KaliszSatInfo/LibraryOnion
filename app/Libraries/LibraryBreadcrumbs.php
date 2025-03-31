<?php

namespace App\Libraries;

class LibraryBreadcrumbs
{
    protected $breadcrumbs = [];

    public function push($title, $url = '', $noIndex = false)
    {
        if ($noIndex) {
            $url = site_url($url);
        }
        $this->breadcrumbs[] = ['title' => $title, 'url' => $url];
    }

    public function unshift($title, $url = '', $noIndex = false)
    {
        if ($noIndex) {
            $url = site_url($url);
        }
        array_unshift($this->breadcrumbs, ['title' => $title, 'url' => $url]);
    }

    public function show()
    {
        $output = '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
        foreach ($this->breadcrumbs as $breadcrumb) {
            $output .= '<li class="breadcrumb-item"><a href="' . $breadcrumb['url'] . '">' . $breadcrumb['title'] . '</a></li>';
        }
        $output .= '</ol></nav>';
        return $output;
    }
}
