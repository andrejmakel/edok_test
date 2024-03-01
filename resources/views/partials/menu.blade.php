<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('team_access')
                <li class="{{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                    <a href="{{ route("admin.teams.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.team.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('firma_access')
                <li class="{{ request()->is("admin/firmas") || request()->is("admin/firmas/*") ? "active" : "" }}">
                    <a href="{{ route("admin.firmas.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.firma.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('sender_access')
                <li class="{{ request()->is("admin/senders") || request()->is("admin/senders/*") ? "active" : "" }}">
                    <a href="{{ route("admin.senders.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.sender.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('post_access')
                <li class="{{ request()->is("admin/posts") || request()->is("admin/posts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.posts.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.post.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('e_post_access')
                <li class="{{ request()->is("admin/e-posts") || request()->is("admin/e-posts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.e-posts.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.ePost.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('outgoing_post_access')
                <li class="{{ request()->is("admin/outgoing-posts") || request()->is("admin/outgoing-posts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.outgoing-posts.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.outgoingPost.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('call_access')
                <li class="{{ request()->is("admin/calls") || request()->is("admin/calls/*") ? "active" : "" }}">
                    <a href="{{ route("admin.calls.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.call.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('document_access')
                <li class="{{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "active" : "" }}">
                    <a href="{{ route("admin.documents.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.document.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('car_access')
                <li class="{{ request()->is("admin/cars") || request()->is("admin/cars/*") ? "active" : "" }}">
                    <a href="{{ route("admin.cars.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.car.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('upload_access')
                <li class="{{ request()->is("admin/uploads") || request()->is("admin/uploads/*") ? "active" : "" }}">
                    <a href="{{ route("admin.uploads.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.upload.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('invoice_access')
                <li class="{{ request()->is("admin/invoices") || request()->is("admin/invoices/*") ? "active" : "" }}">
                    <a href="{{ route("admin.invoices.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.invoice.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('property_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.property.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('post_property_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.postProperty.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('status_access')
                                        <li class="{{ request()->is("admin/statuses") || request()->is("admin/statuses/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.statuses.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.status.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('postform_access')
                                        <li class="{{ request()->is("admin/postforms") || request()->is("admin/postforms/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.postforms.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.postform.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('notice_access')
                                        <li class="{{ request()->is("admin/notices") || request()->is("admin/notices/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.notices.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.notice.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('query_access')
                                        <li class="{{ request()->is("admin/queries") || request()->is("admin/queries/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.queries.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.query.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('input_access')
                                        <li class="{{ request()->is("admin/inputs") || request()->is("admin/inputs/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.inputs.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.input.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('recipient_access')
                                        <li class="{{ request()->is("admin/recipients") || request()->is("admin/recipients/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.recipients.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.recipient.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('stat_access')
                                        <li class="{{ request()->is("admin/stats") || request()->is("admin/stats/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.stats.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.stat.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('processed_access')
                                        <li class="{{ request()->is("admin/processeds") || request()->is("admin/processeds/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.processeds.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.processed.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('car_property_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.carProperty.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('insurance_access')
                                        <li class="{{ request()->is("admin/insurances") || request()->is("admin/insurances/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.insurances.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.insurance.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('typ_access')
                                        <li class="{{ request()->is("admin/typs") || request()->is("admin/typs/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.typs.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.typ.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('znacka_access')
                                        <li class="{{ request()->is("admin/znackas") || request()->is("admin/znackas/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.znackas.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.znacka.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('call_property_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.callProperty.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('call_typ_access')
                                        <li class="{{ request()->is("admin/call-typs") || request()->is("admin/call-typs/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.call-typs.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.callTyp.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('doc_property_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.docProperty.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('dok_typ_access')
                                        <li class="{{ request()->is("admin/dok-typs") || request()->is("admin/dok-typs/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.dok-typs.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.dokTyp.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('dok_kat_access')
                                        <li class="{{ request()->is("admin/dok-kats") || request()->is("admin/dok-kats/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.dok-kats.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.dokKat.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('invoice_property_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.invoiceProperty.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('nasa_access')
                                        <li class="{{ request()->is("admin/nasas") || request()->is("admin/nasas/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.nasas.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.nasa.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('invoice_typ_access')
                                        <li class="{{ request()->is("admin/invoice-typs") || request()->is("admin/invoice-typs/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.invoice-typs.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.invoiceTyp.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('firma_property_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.firmaProperty.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('spracovany_access')
                                        <li class="{{ request()->is("admin/spracovanies") || request()->is("admin/spracovanies/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.spracovanies.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.spracovany.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('acc_company_access')
                                        <li class="{{ request()->is("admin/acc-companies") || request()->is("admin/acc-companies/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.acc-companies.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.accCompany.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('ucto_access')
                                        <li class="{{ request()->is("admin/uctos") || request()->is("admin/uctos/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.uctos.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.ucto.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('e_schranka_access')
                                        <li class="{{ request()->is("admin/e-schrankas") || request()->is("admin/e-schrankas/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.e-schrankas.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.eSchranka.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('sidlo_access')
                                        <li class="{{ request()->is("admin/sidlos") || request()->is("admin/sidlos/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.sidlos.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.sidlo.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('bank_access')
                                        <li class="{{ request()->is("admin/banks") || request()->is("admin/banks/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.banks.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.bank.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('lang_access')
                            <li class="{{ request()->is("admin/langs") || request()->is("admin/langs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.langs.index") }}">
                                    <i class="fa-fw fas fa-globe">

                                    </i>
                                    <span>{{ trans('cruds.lang.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>