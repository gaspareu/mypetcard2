pragma solidity ^0.4.18;

  contract CheckHash{
    address public _owner;
    address public _prof;
    mapping (address => string) hash;

    function CheckHash() {
      _owner = msg.sender;
    }

    function setHash(string _hash) returns(bool success){
      if(msg.sender != _owner) {revert();}
      hash[_owner] = _hash;
      return true;
    }

    function getHash() constant returns(string _hash){
      require(_owner == msg.sender);
      return hash[_owner];
    }
  }
