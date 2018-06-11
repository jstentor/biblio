<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Treetemas Controller
 *
 */
class TreetemasController extends AppController 
{

	function index() 
	{
		$treetemas = TableRegistry::get('Treetemas');
		$temas = $treetemas->find('list', ['spacer' => ' > ']);
	 	$this->set(compact('temas'));
	}

	function add() {
	 if (!empty($this->data)) {
	 $this->Category->save($this->data);
	 $this->redirect(array('action'=>'index'));
	 } else {
	 $parents[0] = "[ No Parent ]";
	 $Categorylist = $this->Category->generatetreelist(null,null,null," - ");
	 if($Categorylist){
	 foreach ($Categorylist as $key=>$value){
	 $parents[$key] = $value;
	 }
	 $this->set(compact('parents'));
	 }
	 }
	 }

	function edit($id=null) {
	 if (!empty($this->data)) {
	 if($this->Category->save($this->data)==false)
	 $this->Session->setFlash('Error saving Category.');
	 $this->redirect(array('action'=>'index'));
	 } else {
	 if($id==null) die("No ID received");
	 $this->data = $this->Category->read(null, $id);
	 $parents[0] = "[ No Parent ]";
	 $Categorylist = $this->Category->generatetreelist(null,null,null," - ");
	 if($Categorylist)
	 foreach ($Categorylist as $key=>$value)
	 $parents[$key] = $value;
	 $this->set(compact('parents'));
	 }
	 }

	function delete($id=null) {
	 if($id==null)
	 die("No ID received");
	 $this->Category->id=$id;
	 if($this->Category->delete()==false)
	 $this->Session->setFlash('The Category could not be deleted.');
	 $this->redirect(array('action'=>'index'));
	 }

	function moveup($id=null) {
	 if($id==null)
	 die("No ID received");
	 $this->Category->id=$id;
	 if($this->Category->moveup()==false)
	 $this->Session->setFlash('The Category could not be moved up.');
	 $this->redirect(array('action'=>'index'));
	 }

	function movedown($id=null) {
	 if($id==null)
	 die("No ID received");
	 $this->Category->id=$id;
	 if($this->Category->movedown()==false)
	 $this->Session->setFlash('The Category could not be moved down.');
	 $this->redirect(array('action'=>'index'));
	 }
	 function removeNode($id=null){
	 if($id==null)
	 die("Nothing to Remove");
	 if($this->Category->removeFromTree($id)==false)
	 $this->Session->setFlash('The Category can\'t be removed.');
	 $this->redirect(array('action'=>'index'));
	 }

}
?>