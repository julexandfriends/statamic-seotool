<?php

namespace Statamic\Addons\SeoTool;

use Statamic\API\File;
use Statamic\API\Parse;
use Statamic\Extend\Tags;

use Statamic\API\URL;
use Statamic\API\Data;
use Statamic\Contracts\Data\Data as DataContract;

class SeoToolTags extends Tags
{
    /**
     * The {{ seo_tool }} tag
     *
     * @return string|array
     */
    public function meta() {

        $data = $this->buildMetaTags();

        $file_path = "{$this->getDirectory()}/resources/views/meta.html";
        $file_content = File::get($file_path);

        return Parse::template($file_content, $data);
    }

    private function buildMetaTags() {
        $page_data = array_get($this->context, "page_object");

        if (!$page_data instanceof DataContract) {
            $this->model = Data::find($page_data["id"]);
        } else {
            $this->model = $page_data;
        }

        
        $data = array();

        $data["title"] = $this->getConfig("title");
        $data["home_url"] = URL::makeAbsolute('/');
        $data["description"] = $this->getConfig("description");
        $data["locale"] = $this->getConfig("locale", "de_DE");
        $data["image"] = $this->model->get("og_image") ? $this->model->get("og_image") : $this->getConfig("image");
        
        //$data["canonical_url"] = $this->model->absoluteUrl();

        return $data;
    }
}
