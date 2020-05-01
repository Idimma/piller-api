<?php

namespace App\Services;

use App\{CompanyInfo, FAQ};


class SettingService
{
    private $location_arr = ['address', 'lat', 'lon'];
    public function __construct(CompanyInfo $company, FAQ $faq)
    {
        $this->company = $company;
        $this->faq = $faq;
    }

    public function getAllFaqs()
    {
        return $this->faq::get();
    }

    public function getCompanyInfo(String $type)
    {
        return $this->company::where('title', $type)->first();
    }

    public function setCompanyInfo(array $data)
    {
        return $this->company::updateOrCreate(
            ['title' => $data['title']],
            ['details' => $data['details']]
        );
    }
    public function getBaseLocation()
    {
        $location = [];
        foreach ($this->location_arr as $key) {
            $det = $this->getCompanyInfo($key);
            $location[$key] =  $det['details'] ?: '';
        }
        return (object) $location;
    }

    public function setBaseLocation(array $data)
    {
        $location = [];
        foreach ($this->location_arr as $key) {
            $location[$key] = $this->setCompanyInfo([
                'title' => $key,
                'details' => $data[$key],
            ])['details'];
        }
        return (object) $location;
    }
}
