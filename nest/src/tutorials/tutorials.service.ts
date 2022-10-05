import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { CreateTutorialDto } from './dto/create-tutorial.dto';
import { UpdateTutorialDto } from './dto/update-tutorial.dto';
import { Tutorial } from './entities/tutorial.entity';

@Injectable()
export class TutorialsService {
    constructor(
      @InjectRepository(Tutorial)
      private tutorialsRepository: Repository<Tutorial>,
    ){}

  create(createTutorialDto: CreateTutorialDto) {
    this.tutorialsRepository.save(createTutorialDto);
  }

  findAll() {
    return this.tutorialsRepository.find();
  }

  findOne(id: number) {
    return this.tutorialsRepository.findOne({where: {id}});
  }

  update(id: number, updateTutorialDto: UpdateTutorialDto) {
    return this.tutorialsRepository.update(id, updateTutorialDto);
  }

  remove(id: number) {
    return this.tutorialsRepository.delete(id);
  }
}
