<?php 

class Worker extends Initiator {


   public function takeData(...$params) {
     if (count($params) === 1 && $params[0] instanceof Closure) {

       return args(
           call_user_func($params[0], ...$this->getArguments())
         );

     } else {

       return args(...$params);   
           
     }
   }



   public function setData(...$params) {
     $this->data = $this->takeData(...$params);
     return $this;
   }



   public function appendData(...$params) {
     
     $data = $this->takeData(...$params);
     $this->data->merge($data);

     return $this;
   }

  public function maintain(Closure $callback) {

     $arguments = $this->data->get();

     $callback($this);

     $this->data->set($arguments);
     
     return $this;

  }



  public function then(Closure $next) {

      $method = $this->getMethod($next);

      return $this->run(
          $method, $this
      );

  }



  public function getArguments($params) {

     return $this->data->getMergedData($params);

  }



  public function afterCall($res) {

     $this->data->set(
        Args::asArgument(
          $res
        )
     );

     return $this;
   }




  public function run($method, ...$params) {
     
        // var_dump($params);

        return
         $this->afterCall(  
            $method(
               $this->getArguments($params)
            )
         );  
   }





  public function getMethod($method) {
      
      $callback = $method instanceof Closure 
          ? $method
          : $this->findMethod($method);

      return function ($params) use ($callback) {

        return $callback(...$params);

      };
      
   }




  public function __call($method, $params) {

    if (!$params) {
      $params = [];
    }

    return $this->run(
      $this->getMethod($method), ...$params
    );

   }



   public function __construct($class) {
      parent::__construct($class);
      $this->data = args();
   }



  
   public function __invoke($class) {
      $this->__construct($class);
   }

}