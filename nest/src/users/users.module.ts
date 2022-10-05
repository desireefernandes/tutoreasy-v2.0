import { Module } from '@nestjs/common';
import { UsersService } from './users.service';
import { UsersController } from './users.controller';
import { TypeOrmModule } from '@nestjs/typeorm';
import { User } from './entities/user.entity';
/**
 * O modulo é onde você irá agrupar o seu conjunto de rotas (Controller)
 * As suas implementações de negocio, como criar um novo registro, buscar registros (Service)
 * As suas entidades, que são basicamente o espelho da sua tabela no banco de dados
 */
@Module({
  /**
   * TypeOrmModule.forFeature([User]) o que isso quer dizer ?
   * Assim como no AppModule (modulo principal da aplicação)
   * Temos que configurar o Typeorm com as credenciais do banco e etc
   * Aqui é preciso especificar pra o Typeorm, quais entidades ele deve mapear desse modulo
   * Nesse caso ele só tem que mapear o User, se tivessemos outra entidade aqui estaria
   * mais ou menos assim TypeOrmModule.forFeature([User, OutraEntidade])
   */
  imports: [TypeOrmModule.forFeature([User])],
  controllers: [UsersController],
  providers: [UsersService],
})
export class UsersModule {}
