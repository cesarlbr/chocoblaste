<?php

namespace App\Service;

use App\Repository\CommentaryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ChocoblastRepository;

class CommentaryService implements ServiceInterface
{

    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly CommentaryRepository $commentaryRepository
    ) {
    }
    public function create(object $objet)
    {
        if (!$this->commentaryRepository->findOneBy([
            "content" => $objet->getContent(), "createAt" => $objet->getCreateAt()
            ])) {
                $this->em->persist($objet);
                $this->em->flush();
        }
        else{
            throw new \Exception("Le commentaire existe déja");
        }
    }

    public function  update(object $objet) {
        if ($this->commentaryRepository->findOneBy([
            "content" => $objet->getContent(), "createAt" => $objet->getCreateAt()
            ])) {
                $this->em->persist($objet);
                $this->em->flush();
        }
        else{
            throw new \Exception("Le commentaire n'existe pas");
        }
    }

    public function delete(int $id) {
        $commentary = $this->commentaryRepository->find($id);
        if ($commentary) {
            $this->em->remove($commentary);
            $this->em->flush();
        }
        else{
            throw new \Exception("le commentaire n'existe pas");
        }
    }

    public function findOneBy(int $id): object {
        return $this->commentaryRepository->find($id)??throw new \Exception("Le commentaire n'existe pas");
    }

    public function findAll(): array {
        return $this->commentaryRepository->findAll()??throw new \Exception("La liste des commentaires est vide");
    }
}
