<?php
namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use 
Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController{
    /**
     * @Route("/", name="article_list")
     * @Method({"GET"})
     */
    public function index() {

        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('articles/index.html.twig', array('articles' => $articles));

    }

    /**
     * @Route("/article/new", name="new_article")
     * @Method({"GET", "POST"})
     */

     public function new(Request $request){
        $article = new Article();

        $form = $this->createFormBuilder($article)
        ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('body', TextareaType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('save', SubmitType::class, array(
          'label' => 'Create',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $article = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_list');

        }
        return $this->render('/articles/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */

    public function show($id){
        $article = $this->getDoctrine()->getRepository
        (Article::class)->find($id);

        return $this->render('articles/show.html.twig', array('article' => $article));
    }

    /**
     * Deletes a testing entity.
     *
     * @Route("/{id}", name="testing_delete")
     * @Method("DELETE")
     */
    public function delete(Request $request, $id)
    {

        $em = $this->getDoctrine()->getRepository(Article::class)->find($id);
        $em->remove($article);
        $em->flush();
        $response = new Response();
        $response->send();

        //return $this->redirectToRoute('index.html.twig');
    }

$db = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// $search = mysqli_real_escape_string($db, $_GET["id"]);
// $userid = "";
// echo $search;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $rid=$_GET["id"];
    $query = "
    DELETE FROM reviews WHERE review_id=".$rid;
    // echo $query;
    $result2 = mysqli_query($db, $query);
    $row2 = mysqli_fetch_array($result2);
    $finalurl = 'location: listreviews.php';
    header($finalurl); 
}

}