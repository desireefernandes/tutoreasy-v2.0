import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { CreateUserDto } from './dto/create-user.dto';
import { UpdateUserDto } from './dto/update-user.dto';
import { User } from './entities/user.entity';

@Injectable()
export class UsersService {
  constructor(
    /**
     * O repository é a forma que o Typeorm provê para interagir com o banco a partir de uma entidade
     * O repository é generico, então para utilizar é preciso informar para qual entidade ele vai apontar
     * nesse caso o <User> e ai teremos acesso a funções como save, find e etc
     */
    @InjectRepository(User) private usersRepository: Repository<User>,
  ) {}

  create(createUserDto: CreateUserDto) {
    this.usersRepository.save(createUserDto);
  }

  findAll() {
    return this.usersRepository.find();
  }
s
  findOne(id: number) {
    return this.usersRepository.findOne({where: {id}});
  }

  update(id: number, updateUserDto: UpdateUserDto) {
    return this.usersRepository.update(id, updateUserDto)
  }

  remove(id: number) {
    return this.usersRepository.delete(id);
  }
}
