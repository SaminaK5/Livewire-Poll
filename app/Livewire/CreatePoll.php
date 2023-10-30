<?php

namespace App\Livewire;

use App\Models\poll;
use Livewire\Component;
use Livewire\Attributes\On;

class CreatePoll extends Component
{

    public $title;
    public $options=['First'];

    public function addOption(){
        $this->options[]='';
    }

    public function remove($index){
       unset($this->options[$index]);
       $this->options = array_values($this->options);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $rules =[

        'title' => 'required|min:3|max:255',
        // validating arrays ,first set would be array and second would be each value inside of it
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255'

    ];
    protected $messages =[

        'options.*' => "The option can't be empty"
    ];

    public function create_Poll(){

          $this->validate();

/*-----1st ways to to store data into a table (title and options which we entered into form)----------

            $poll = poll::create([
                  'title' => $this->title
            ]);

            foreach($this->options as $optionName){
                $poll->options()->create(['options' => $optionName]);
            }

----------2nd way using laravel ---------------- ------------------*/

            poll::create([
                'title' => $this->title
            ])->options()->createMany(
                collect($this->options)
                -> map(fn($option)=>['options' => $option])
                ->all()
            );


            $this->reset(['title','options']);
            $this->dispatch('pollCreated');




    }
    public function render()
        {
            return view('livewire.create-poll');
        }
}
