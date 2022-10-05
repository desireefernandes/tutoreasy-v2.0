import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { User } from './users/entities/user.entity';
import { UsersModule } from './users/users.module';
import { Tutorial } from './tutorials/entities/tutorial.entity'
import { TutorialsModule } from './tutorials/tutorials.module';
import { Follow } from './follows/entities/follow.entity';
import { FollowsModule } from './follows/follows.module';

@Module({
  /**
   * TypeOrmModule.forRoot serve para configurar o Typeorm para qual
   * Banco ele vai ser configurado e quais credenciais irá utilizar
   */
  imports: [
    TypeOrmModule.forRoot({
      type: 'postgres',
      host: 'localhost',
      port: 5432,
      username: 'postgres',
      password: 'postgres',
      database: 'tutoreasy',
      /**
       * Aqui nós devemos informar todas as entidades que o Typeorm deve ler
       * Note que aqui se a entidade não for mapeada no seu proprio modulo, ele irá apresentar erro
       * TypeormModule.forFeature([User])
       */
      entities: [User, Tutorial, Follow],
      /**
       * O synchronize informa para o Typeorm que ele deve manter o banco sempre sincronizado
       * Ou seja, sempre que uma alteração for feita nas entidades ele ira refletir automaticamente no banco
       * E se a entidade não existe, irá fazer a criação da tabela para que a aplicação funcione
       * OBS isso não deve ser utilizado em produção, pois oferece risco de perca de dados, e pra poder manter
       * o banco sincronizado temos o conceito de migration, depois posso trazer referências e explicar o que é
       */
      synchronize: true,
    }),
    // Todos os modulos desenvolvidos na aplicação devem ser importador no App para serem acessiveis
    UsersModule,
    TutorialsModule,
    FollowsModule,
  ],
  controllers: [],
  providers: [],
})
export class AppModule {}
